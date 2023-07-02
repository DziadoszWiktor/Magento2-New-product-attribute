# **Magento2 new product attribute**
**This module will add a new product attribute by Patch Data. Such attribute can be useful for future `new products` custom category implementation.**

<br>

## **Installation**
Clone this repo into your Magento 2 project in `/app/code` folder.

## **After Installation**
Run

    bin/magento setup:upgrade
    bin/magento setup:di:compile
    bin/magento cache: flush


Enable the new module

    bin/magento module:enable Wiktor_NewProducts


Make sure the new module is enabled

    bin/magento module:status

For checking new attributes enter in `patch_list` or `eav_attributes` magento db tables


<br>
Compatible with Magento 2.1.x, 2.2.x, 2.3.x and 2.4.x