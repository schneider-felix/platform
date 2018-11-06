<?php declare(strict_types=1);

namespace Shopware\Core\Framework\DependencyInjection\CompilerPass;

use Shopware\Core\Framework\FeatureFlag\FeatureConfig;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class FeatureFlagCompilerPass implements CompilerPassInterface
{
    /**
     * You can modify the container here before it is dumped to PHP code.
     */
    public function process(ContainerBuilder $container)
    {
        $services = $container->findTaggedServiceIds('shopware.feature');

        foreach ($services as $serviceId => $tags) {
            foreach($tags as $tag) {
                if(!isset($tag['flag'])) {
                    throw new \RuntimeException('"flag" is a required field for "shopware.feature" tags');
                }

                if(FeatureConfig::isActive($tag['flag'])) {
                    continue;
                }

                $container->removeDefinition($serviceId);
                break;
            }
        }
    }
}
