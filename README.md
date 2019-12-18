# Xfrocks/UsingK8s
Helper to deploy XenForo on Kubernetes

## Development

### Continuous Integration

In order to enable GitLab CI, follow these steps:

1. Update setting **Custom CI configuration path** to `_files/ci/gitlab.yml` (Settings > CI / CD > General pipelines)
1. Add variable: `KUBERNETES_DEPLOY_CA`
1. Add variable: `KUBERNETES_DEPLOY_SERVER`
1. Add variable: `KUBERNETES_DEPLOY_TOKEN`
1. Add variable: `SELF_REPO`
1. Add variable: `XENFORO2_REPO`

The pipeline deploys review environments for merge requests.
Each deployment will have XenForo 2 + add-on files deployed with an instance of MySQL and a FTP server (Pure-FTPd).
A `config.php` is pre-generated with database credentials and file system mounts for both `./data` and `./internal_data`.
**Note:** installation has to be done manually.
