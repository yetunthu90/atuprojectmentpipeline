# ADR: Azure Kubernetes Cluster for Project Final Deployment

## Context
- [x] Our project is able to deploy to an AKS cluster without any modification in code, so we chose AKS.
- [x] For this pilot project, we already have Azure credit points, so we do not need to worry about cost limitations.

## Decision
- [x] We decided to use Azure Kubernetes Service (AKS) to avoid any additional costs and reduce the effort required for deployment.

## Rationale
- [x] Before making this decision, we considered using Amazon Elastic Kubernetes Service (EKS) or Elastic Container Service (ECS).
- [x] However, these services could incur additional charges, which we wanted to avoid. This was the primary reason for selecting AKS for our project deployment.

## Status
**Accepted**  
- [x] The proposed ADR has been agreed upon and approved by all team members.

## Consequences
- [x]  The project deployment went smoothly using AKS.
- [x]  However, we need to ensure that the credit points do not exceed the allocated limit.
