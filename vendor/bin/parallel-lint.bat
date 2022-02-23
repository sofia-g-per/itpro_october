@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../php-parallel-lint/php-parallel-lint/parallel-lint
php "%BIN_TARGET%" %*
