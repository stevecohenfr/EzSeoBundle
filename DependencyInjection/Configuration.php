<?php

namespace SteveCohenFR\EzSeoBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('steve_cohen_fr_ez_seo');

        $rootNode
            ->children()
                ->arrayNode('providers')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('class')->end()
                        ->end()
                    ->end()
                ->end() // providers
                ->arrayNode("config")
                    ->children()
                        ->arrayNode("meta_title")
                            ->children()
                                ->integerNode('length')->defaultValue(60)->end()
                                ->scalarNode('default')->defaultValue("")->end()
                            ->end()
                        ->end() // meta_title
                        ->arrayNode("meta_description")
                            ->children()
                                ->integerNode('length')->defaultValue(158)->end()
                                ->scalarNode('default')->defaultValue("")->end()
                            ->end()
                        ->end() // meta_description
                    ->end()
                ->end() // config
            ->end()
        ;

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
