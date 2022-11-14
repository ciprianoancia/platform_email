<?php

namespace Drutiny\Common\Audit;

use Drutiny\Audit;
use Drutiny\Sandbox\Sandbox;
use Drutiny\Annotation\Param;
use Drutiny\Annotation\Token;
use Drutiny\Acquia\Audit\EnvironmentAnalysis

class PlatformEmail extends Audit {

  /**
  * Returns the latest PHP version
  * @inheritdoc
  */
  //{acquia.cloud.application.uuid}
  public function audit(Sandbox $sandbox) {

    $phpVersion = 'php -v | grep ^PHP | cut -d\' \' -f2';

    $output = (string) $sandbox->exec($phpVersion);

    if (empty($output)) {
      return FALSE;
    }

    $sandbox->setParameter('version', $output);
    return TRUE;
  }
}

