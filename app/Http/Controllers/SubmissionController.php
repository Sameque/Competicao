<?php

namespace App\Http\Controllers;

//use App\CrawleRepository\ValidateUsers;
use App;
use App\Http\Requests;
use App\UserRepository;
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
        return view('register.submission');
    }

    public function crawler()
    {
//        return view('register.submission');

//        $html = '<html>
//                    <body>
//                        <h1>Samer</h1>
//                        <h1>jose</h1>
//                        <div>
//                            <div>
//                                <p class="message">Hello World!</p>
//                            </div>
//
//                            <p>Hello Crawler!</p>
//                        </div>
//                    </body>
//                </html>';

//        $postdata = http_build_query(
//            array(
//                'email' => 'a@a.com',
//                'password' => '123456'
//
//            )
//        );
//
//        $opts = array('http' =>
//            array(
//                'method'  => 'POST',
////                'header'  => 'Content-type: application/x-www-form-urlencoded',
////                '_Token'=>'94c94a8120d8012be561267e05cb8ac74be1cb46%3A',
//                'content' => $postdata
//
//            )
//        );


//        $context  = stream_context_create($opts);

//        $html = file_get_contents('http://uniararas.br/');

//        $html = file_get_contents('http://www.spoj.com/');
//        $html = file_get_contents('https://www.urionlinejudge.com.br/judge/pt/problems/view/1001/');
//        $result = file_get_contents('https://www.urionlinejudge.com.br/judge/en/profile/6566');
//        $result = file_get_contents('https://www.urionlinejudge.com.br/repository/UOJ_1013.html');

//        dd( file_get_contents('https://www.urionlinejudge.com.br/judge/pt/problems/view/1013'));

//        $html = Crawler::xpathLiteral($this->index());
//        $html = 'http://br.spoj.com/';

//        var_dump($result);
//        $crawler = new Crawler($result);
//        $crawler = $crawler->filterXPath('descendant-or-self::body/p');
//        $crawler = $crawler->filter('body > div > div > div > div > div');
//        $crawler->addHtmlContent('http://br.spoj.com/');
//        foreach ($crawler as $domElement) {
//            echo $domElement->nodeValue . '<br/>';
//        }
//
//        foreach ($crawler as $domElement) {
////            var_dump($domElement);
//        }


        $validateUser = App::make('ValidateRepository');
        $user = App\User::findOrNew(1);

        $userRepository = $user->userRepository->first();
        $userRepository->repository_id = '7';

//        dd($userRepository);

        $resp = $validateUser->validate($userRepository);

        dd($resp);
        return $resp.'';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function validuser()
    {
        //
    }

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
