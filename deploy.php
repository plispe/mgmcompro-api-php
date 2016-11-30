<?php
namespace Deployer;
require __DIR__ . '/app/environment.php';

require 'recipe/common.php';

// Configuration

set('repository', 'git@github.com:beplus/mgmcompro-api-php.git');
set('shared_files', []);
set('shared_dirs', []);
set('writable_dirs', []);

// Servers

server('production', getenv('DEPLOYER_HOST'), (int) getenv("DEPLOYER_PORT"))
    ->user(getenv("DEPLOYER_USER"))
    ->password(getenv("DEPLOYER_PASSWORD"))
    ->set('deploy_path', '/var/www/api.mgm-compro.com/htdocs');


// Tasks

desc('Deploy your project');
task('deploy', [
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

after('deploy', 'success');
