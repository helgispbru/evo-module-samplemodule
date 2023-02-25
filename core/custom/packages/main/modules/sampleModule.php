<?php
namespace EvolutionCMS\Smtauto\Controllers;

use EvolutionCMS\Models\SiteContent;
use Illuminate\Support\Facades\Request;
use Tracy\Debugger;

if (!defined('MODX_BASE_PATH')) {
    die('HACK???');
}

Debugger::enable();

$result = '';
$breadcrumbs = [];

$doc = [];
if ((int) Request::input('docid')) {
    $doc = SiteContent::where('id', Request::input('docid'))
        ->get();
    $doc = $doc->toArray();
    $doc = $doc[0];

    $breadcrumbs[] = [
        'link' => Request::fullUrlWithQuery(['action' => 'list', 'docid' => $doc['parent']]),
        'title' => 'Назад',
    ];
}

$action = 'list';
if (!empty(Request::input('action'))) {
    $action = Request::input('action');
}

switch ($action) {
    case 'list':
        $docs = SiteContent::where('parent', (int) Request::input('docid'))
            ->orderBy('isfolder', 'desc')
            ->get();

        $result .= '<p>Всего записей: ' . $docs->count() . 'шт.</p>';
        $result .= view('modules.samplemodule.rows', ['rows' => $docs->toArray()]);
        break;

    case 'docinfo':
        $result .= view('modules.samplemodule.docinfo', ['doc' => $doc]);
        break;

    case 'docedit':
        $result .= view('modules.samplemodule.docedit', [
            'doc' => $doc,
            'formaction' => Request::fullUrlWithQuery(['action' => 'docsave', 'docid' => Request::input('docid')]),
        ]);
        break;

    case 'docsave':
        if ((int) Request::input('docid')) {
            $data = [
                'id' => (int) Request::input('docid'),
                'pagetitle' => Request::input('pagetitle'),
                'longtitle' => Request::input('longtitle'),
                'alias' => Request::input('alias'),
            ];

            $res = \DocumentManager::edit($data);

            $doc = [];
            if ((int) Request::input('docid')) {
                $doc = SiteContent::where('id', Request::input('docid'))
                    ->get();
                $doc = $doc->toArray();
                $doc = $doc[0];
            }
        }

        $result .= view('modules.samplemodule.docinfo', ['doc' => $doc]);
        break;
}

return view('modules.samplemodule.layout', [
    'result' => $result,
    'breadcrumbs' => $breadcrumbs,
]);
