<?php

return [

    /**
     * If you create your engine at https://cse.google.com/cse/ you will find the ID after you click at Settings.
     * Just check the URL you have like https://cse.google.com/cse/setup/basic?cx=search_engine_id
     * and the string after cx= is your search engine ID
     *
     * !! Attention !! If you change style of your Custom search engine, the ID can be changed
     */
    'engineId' => '',

    /**
     * For generation API key you have to go to https://console.developers.google.com, than
     * 1. click on the menu on the right side of the GoogleAPI logo and click on 'Create project'
     * 2. enter the name of the new project - it is up to you, you can use 'Google CSE'
     * 3. wait until project is created - the indicator is color circle on the top right corner around the bell icon
     * 4. API list is shown - search for 'Google Custom Search API' and click on it
     * 5. click on 'Enable' icone on the right side of Custom Search API headline
     * 6. click on the 'Credentials' on the left menu under the 'Library' section
     * 7. click on the 'Create credentials' and choose 'API key'
     * 8. your API key is shown, so copy and paste it here
     *
     * !! Attention !! It can take some time to API key will be authorized, wait 10 mins before starting to use it
     */
    'apiKey' => ''
];
