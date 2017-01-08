<?php
/**
 * @copyright Garrick S. Bodine, 2012
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

// basically, this is just the Omeka simple_search minus the hardcoded fieldset and some added Bootstrap classes:
function bootstrap_simple_search($buttonText = null, $formProperties = array('id' => 'simple-search'), $uri = null)
{
    if (!$buttonText) {
        $buttonText = __('Search');
    }

    if (!$uri) {
        $uri = apply_filters('simple_search_default_uri', url('items/browse'));
    }

    $searchQuery = array_key_exists('search', $_GET) ? $_GET['search'] : '';
    $formProperties['action'] = $uri;
    $formProperties['method'] = 'get';
    $html  = '<form ' . tag_attributes($formProperties) . '><div class="input-group">';
    $html .= get_view()->formText('search', $searchQuery, array('name' => 'search', 'class' => 'input-md'));
    $html .= get_view()->formSubmit('submit_search', $buttonText, array('class' => 'button'));

    $parsedUri = parse_url($uri);
    if (array_key_exists('query', $parsedUri)) {
        parse_str($parsedUri['query'], $getParams);
        foreach($getParams as $getParamName => $getParamValue) {
            $html .= get_view()->formHidden($getParamName, $getParamValue);
        }
    }

    $html .= '</div></form>';
    return $html;
}

function filterPublicNavigationMain($nav)
{
    //$nav[] = array('class' => 'nav');
    return $nav;
}
?>
