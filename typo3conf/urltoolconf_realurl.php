<?php

/**
 *
 * dix_UrlTool default realurl configuration
 * based on realurl-configuration of news.typo3.org
 * 	http://news.typo3.org/about/realurl-configuration/
 *
 */

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'] = array ( 
    '_DEFAULT' => array (
        'init' => array (
            'enableCHashCache' => '1',
            'appendMissingSlash' => 'ifNotFile',
            'enableUrlDecodeCache' => '1',
            'enableUrlEncodeCache' => '1',
            'emptyUrlReturnValue' => true,
        ),
        'redirects' => array (
        ),
        'preVars' => array (
            '0' => array (
                'GETvar' => 'no_cache',
                'valueMap' => array (
                    'nc' => '1',
                ),
                'noMatch' => 'bypass'
            ),
            '1' => array (
                'GETvar' => 'L',
                'valueMap' => array (
                    'de' => '0',
                    'en' => '1',
                ),
                'noMatch' => 'bypass',
            ),
            '2' => array (
                'GETvar' => 'lang',
                'valueMap' => array (
                    'de' => 'de',
                    'en' => 'en',
                ),
                'noMatch' => 'bypass',
            ),
        ),
        'pagePath' => array (
            'type' => 'user',
            'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
            'spaceCharacter' => '-',
            'languageGetVar' => 'L',
            'expireDays' => '7',
        ),
        'fixedPostVars' => array (
        ),
        'postVarSets' => array (
            '_DEFAULT' => array (
                'archive' => array (
                    '0' => array (
                        'GETvar' => 'tx_ttnews[year]',
                    ),
                    '1' => array (
                        'GETvar' => 'tx_ttnews[month]',
                        'valueMap' => array (
                            'january' => '01',
                            'february' => '02',
                            'march' => '03',
                            'april' => '04',
                            'may' => '05',
                            'june' => '06',
                            'july' => '07',
                            'august' => '08',
                            'september' => '09',
                            'october' => '10',
                            'november' => '11',
                            'december' => '12',
                        ),
                    ),
                ),
                'browse' => array (
                    '0' => array (
                        'GETvar' => 'tx_ttnews[pointer]',
                    ),
                ),
                'select_category' => array (
                    '0' => array (
                        'GETvar' => 'tx_ttnews[cat]',
                    ),
                ),
                'article' => array (
                    '0' => array (
                        'GETvar' => 'tx_ttnews[tt_news]',
                        'lookUpTable' => array (
                            'table' => 'tt_news',
                            'id_field' => 'uid',
                            'alias_field' => 'title',
                            'addWhereClause' => ' AND NOT deleted',
                            'useUniqueCache' => '1',
                            'useUniqueCache_conf' => array (
                                'strtolower' => '1',
                                'spaceCharacter' => '-',
                            ),
                        ),
                    ),
                    '1' => array (
                        'GETvar' => 'tx_ttnews[swords]',
                    ),
                ),
            ),
        ),
        'fileName' => array (
//
// if you don't want .html-URLs set the following to "false" (e.g. 'defaultToHTMLsuffixOnPrev' => false,)
// then you get http://www.yourdomain.com/imprint/ instead of http://www.yourdomain.com/imprint.html
//
            'defaultToHTMLsuffixOnPrev' => false,
            'index' => array (
                'rss.xml' => array (
                    'keyValues' => array (
                        'type' => '100',
                    ),
                ),
                'rss091.xml' => array (
                    'keyValues' => array (
                        'type' => '101',
                    ),
                ),
                'rdf.xml' => array (
                    'keyValues' => array (
                        'type' => '102',
                    ),
                ),
                'atom.xml' => array (
                    'keyValues' => array (
                        'type' => '103',
                    ),
                ),
            ),
        ),
    ),

); 


$domains = array(
	'_DEFAULT' => '1',
);
foreach ($domains as $domain=>$pid) {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'][$domain] = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']['_DEFAULT'];
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'][$domain]['pagePath']['rootpage_id'] = $pid;
}
?>
