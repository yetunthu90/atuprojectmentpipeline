provider "kubernetes" {
  config_path = "~/.kube/config" # Adjust based on your Kubernetes setup
}

# New Relic License Key
variable "newrelic_license_key" {
  description = "New Relic License Key"
  type        = string
}

# Helm provider to install New Relic and Fluent Bit
provider "helm" {
  kubernetes {
    config_path = "~/.kube/config"
  }
}

# Namespace for New Relic
resource "kubernetes_namespace" "newrelic" {
  metadata {
    name = "newrelic"
  }
}

# Install New Relic Kubernetes Integration
resource "helm_release" "newrelic_integration" {
  name       = "newrelic-bundle"
  #namespace  = kubernetes_namespace.newrelic.metadata[0].name

  chart      = "nri-bundle"
  repository = "https://helm-charts.newrelic.com"

  values = [
    <<EOF
global:
  licenseKey: "${var.newrelic_license_key}"
  cluster: "my-kubernetes-cluster" # Replace with your cluster name

newrelic-infrastructure:
  enabled: true

kube-state-metrics:
  enabled: true

prometheus:
  enabled: false # Set to true if you want to include Prometheus metrics

logging:
  enabled: false # We'll set up Fluent Bit separately for logging
EOF
  ]
}

# Fluent Bit for Log Forwarding to New Relic
resource "helm_release" "fluent_bit" {
  name       = "fluent-bit"
  #namespace  = kubernetes_namespace.newrelic.metadata[0].name

  chart      = "fluent-bit"
  repository = "https://fluent.github.io/helm-charts"

  values = [
    <<EOF
backend:
  type: "forward"
  forward:
    host: "log-api.newrelic.com"
    port: 443
    tls: true
    shared_key: "${var.newrelic_license_key}"

input:
  tail:
    path: "/var/log/containers/*.log"
    parser: "docker"
EOF
  ]
}

# (Optional) Prometheus Setup
resource "helm_release" "prometheus" {
  name       = "prometheus"
  #namespace  = kubernetes_namespace.newrelic.metadata[0].name

  chart      = "prometheus"
  repository = "https://prometheus-community.github.io/helm-charts"

  values = [
    <<EOF
server:
  global:
    scrape_interval: 15s
  scrape_configs:
    - job_name: "kubernetes-pods"
      kubernetes_sd_configs:
        - role: pod
EOF
  ]
}

# Outputs for convenience
output "newrelic_dashboard_url" {
  value = "https://one.newrelic.com"
  description = "URL for the New Relic dashboard"
}
