<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        return view('register.submission');

//        $html1 = '<html>
//                    <body>
//
//                        <h1>Samer</h1>
//                        <h1>jose</h1>
//                    <div>
//                        <div>
//                            <p class="message">Hello World!</p>
//                        </div>
//
//                        <p>Hello Crawler!</p>
//                     </div>
//                     </body>
//                </html>';

        $html = 'http://br.spoj.com/';

        $crawler = new Crawler(null,$html,null);
//        $crawler = $crawler->filterXPath('descendant-or-self::body/p');
//        $crawler = $crawler->filter('body > div');
        $crawler->addHtmlContent('http://br.spoj.com/');
        foreach ($crawler as $domElement) {
            echo $domElement->nodeValue . '<br/>';
        }

        foreach ($crawler as $domElement) {
//            var_dump($domElement);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
