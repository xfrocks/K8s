#!/bin/sh

set -euo pipefail

_ingressHost=$( echo $_environmentUrl | sed 's#^https*://##' )
_namespace="xfrocks-k8s-$_slug"

kubectl-config.sh

if ! kubectl get "ns/$_namespace" 2>/dev/null; then
  kubectl create namespace $_namespace
fi

kubernetes-deploy $_namespace $KUBERNETES_DEPLOY_CONTEXT \
  "--binding=_ingressHost=$_ingressHost" \
  "--binding=_REVISION=$REVISION" \
  "--binding=_SELF_REPO=$SELF_REPO" \
  "--binding=_XENFORO2_REPO=$XENFORO2_REPO" \
  --template-dir=_files/ci/template
