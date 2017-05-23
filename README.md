# magento2-devtools

Change base_url in database after checkout for your local system 

## Setup

1. Open the example.local.xml file in text editor
2. change the values for your need
3. Add more parameter if you need more (example: "system/smtp/host")
4. Save file in app/etc folder as local.xml

## Use

To use with the default filename (local.xml):

    php bin/magento setup:environment

If you choose a custom name for the config file:

    php bin/magento setup:environment -f | --file "customfilename.xml"

## Backend

To see the content of the parameters go to your magento2 adminpage 
Goto CNX / Environment.

