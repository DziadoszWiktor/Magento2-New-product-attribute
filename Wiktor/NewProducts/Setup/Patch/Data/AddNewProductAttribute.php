<?php

declare(strict_types=1);

namespace Wiktor\NewProducts\Setup\Patch\Data;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Attribute\Data\Boolean;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddNewProductAttribute implements DataPatchInterface
{
    public const NAME = 'is_new';

    private ModuleDataSetupInterface $moduleDataSetup;
    private EavSetupFactory $eavSetupFactory;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function apply()
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $eavSetup->addAttribute(
            Product::ENTITY,
            self::NAME,
            [
                'type'     => 'int',
                'label'    => 'Is New',
                'input'    => 'boolean',
                'source'   => Boolean::class,
                'visible'  => true,
                'default'  => '0',
                'searchable' => true,
                'filterable' => true,
                'comparable' => true,
                'visible_on_front' => true,
                'is_visible_in_grid' => true,
                'required' => false,
                'global'   => ScopedAttributeInterface::SCOPE_STORE,
                'group'    => 'General',
            ]
        );
    }

    public static function getDependencies(): array
    {
        return [];
    }

    public function getAliases(): array
    {
        return [];
    }
}
