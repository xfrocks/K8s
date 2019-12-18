#!/bin/sh

set -euo pipefail

export REVISION=$CI_COMMIT_SHA
_ingressHost=$( echo $CI_ENVIRONMENT_URL | sed 's#^https*://##' )

kubectl-config.sh

if ! kubectl get "ns/$K8S_NAMESPACE" 2>/dev/null; then
  kubectl create namespace $K8S_NAMESPACE
fi

kubernetes-deploy $K8S_NAMESPACE $KUBERNETES_DEPLOY_CONTEXT \
  "--binding=_ingressHost=$_ingressHost" \
  "--binding=_CI_COMMIT_SHA=$CI_COMMIT_SHA" \
  "--binding=_SELF_REPO=$SELF_REPO" \
  "--binding=_XENFORO2_REPO=$XENFORO2_REPO" \
  --template-dir=_files/ci/template
