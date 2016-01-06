<?php

namespace App\Http\Controllers;

//use App\CrawleRepository\ValidateUsers;
use App;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Libraries\CrawlerRepository\RepositoryProblem;
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
    public function update($competition_id)
    {
        $competition = App\Competition::findOrNew($competition_id);

        //PEGAR TODOS OS PROBLEMAS DA COMPETICAO
        $problemCompetition = '';
        foreach($competition->problems as $i){
            $register['code'] = $i->code;
            $register['repository_id'] = $i->repository_id;
            $problemCompetition[] = $register;
        }

        //PEGAR TODOS OS USUÁRO DA COMPETICAO
        $usersCompetiton = '';
        foreach($competition->users as $i){
            $i->userRepository;
            $usersCompetiton[] = $i;
        }

        //VERIFICAR EM TODOS OS PROBLEMAS QUAIS JÁ FORAM RESOLVIDO PELO USUÁRIO
        // NA DATA HORA QUE OCORRE A COMPETICAO
        foreach($problemCompetition as $problem){
            foreach($usersCompetiton as $user){
                foreach($user->userRepository as $userRepository){
                    if($userRepository->reposytory_id = $problem['repository_id']){
                        $this->verifyProblemSolvedUser($competition->dateBegin,$competition->dateEnd,
                            $userRepository->reposytory_id,$userRepository->username,$problem['code']);
                    }
                }
            }

        }

        return $competition;

    }

    private function verifyProblemSolvedUser($competitionBegin_dt,$competitionEnd_dt,$repository_id,$username,$problem){

        $submisions = RepositoryProblem::getRepositoryProblem($repository_id,$problem,$username);

        foreach($submisions as $key => $submision){
            if($submision['problem'] != $problem){
                unset($submisions[$key]);
            }
        }



        dd($submisions);

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

    public function crawler()
    {
//        return view('register.submission');


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

//        $html = file_get_contents('http://br.spoj.com/problems/PLACAR/');
//        $html = file_get_contents('http://br.spoj.com/users/sameque/');//GET USERNAME, USER
        $html = file_get_contents('http://br.spoj.com/status/sameque/');//GET PROBLEM, USER
//        $html = file_get_contents('http://br.spoj.com/problems/BAFO/');//GET PROBLEM, PROBLEM

//        $html = file_get_contents('https://www.urionlinejudge.com.br/judge/pt/problems/view/1001/');
//        $result = file_get_contents('https://www.urionlinejudge.com.br/judge/en/profile/6566');
//        $result = file_get_contents('https://www.urionlinejudge.com.br/repository/UOJ_1013.html');

//        dd($html);

//        $html = Crawler::xpathLiteral($this->index());
//        $html = 'http://br.spoj.com/';

//        var_dump($result);
//        var_dump($crawler);
//        $crawler = $crawler->filterXPath('descendant-or-self::body/p');

//        $html = <<<'HTML'
//         <!DOCTYPE html>
//        <html>
//            <body>
//
//                <article class="123">
//                    <h1>Samer</h1>
//                    <h1>Maria</h1>
//                </article>
//
//                <article class="789">
//                    <h1>Prihh</h1>
//                    <h1>Mek</h1>
//                </article>
//                <div>
//                    <div>
//                        <strong><p class="message">Hello World!</p></strong>
//                    </div>
//                    </i><p>Hello Crawler!</p>
//                </div>
//            </body>
//        </html>;
//HTML;

        $crawler = new Crawler($html);

//        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('table')->eq(1)->filter('h1');//GET NAME PROBLEM
//        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('table')->eq(1)->filter('h2')->eq(1);//GET CODE PROBLEM
//        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('div > div > table')->eq(0)->filter('tr > td')->eq(1);//GET USERNAME, USER
//        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('div > div > h3');//GET NAME, USER
//        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('div > div > table')->eq(1)->filter('td');//PROBLEM SOLVED
//        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('div > div > table')->eq(2)->filter('td');//PROBLEM UNSOLVED
//        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('p');//PROBLEM CONTENT
//        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('pre')->eq(0)->filter('br');//PROBLEM EXEMPLE
        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('table')->eq(1)->filter('td');//->extract(array('_text', 'href'));//PROBLEM USER



//
//        $crawler = $crawler->filter('div');
//            ->eq(1)->filter('div > div > table')->eq(0)->filter('tr > td')->eq(1);
//        ('body > div > div')->eq(1)
//        $crawler = $crawler->filter('body > article')->eq(0)->filter('h1')->eq(0);
//        $crawler->addHtmlContent('http://br.spoj.com/');
//        $crawler = $crawler->filter('body > article')->eq(1)->filter('h1')->eq(0);

//        foreach ($crawler as $key => $domElement) {
//            echo $domElement->nodeValue.'</br>';
//        }

        //
//        $crawler = $crawler->filter('body > div > div')->eq(1);//PROBL//E//M USER
//
//        foreach ($crawler as $key => $domElement) {
//            echo $key.' '.$domElement->nodeValue.'</br>';
//        }



//        $crawler = $crawler
//            ->filter('body > p')
//            ->reduce(function (Crawler $node, $i) {
//                // filter every other node
//                return ($i % 2) == 0;
//            });

        $userAuxi='';
        $i = 2;
        $y = 1;
        $k = 3;
        $j = 6;
        $w = 2;

//        $crawler = $crawler->filterXPath('//body/article')->extract(array('_text', 'href'));
//        dd($crawler);

//        dd($html);
        $html2='';

        foreach ($crawler as $key => $domElement) {

            $html2=$domElement->ownerDocument->saveHTML($domElement);
//            echo $domElement->nodeValue.'</br>';


            if ($key == $w) {

                $crawler2 = new Crawler($html2);
                $crawler2 = $crawler2->filter('a');
                $problem = $crawler2->attr('href');


                $problem = substr($problem,10,100);
//
                $leanString = strlen($problem);
                $problem = substr($problem,0,$leanString-1);
//
                echo $problem.'</br>';
                $w = $w + 7;
            }
        }




//            if( $key == $y ){
//                echo substr($domElement->nodeValue, 13,8) . '  RESULTADO: ';
//                $y = $y +7;
//            }
//
//            if( $key == $k ){
//                echo $domElement->nodeValue . ' LINGUAGEM: ';
//                $k = $k +7;
//            }
//
//            if( $key == $j ){
//                echo $domElement->nodeValue . '</br>';
//                $j = $j +7;
//            }
//        }

//        $i = 1;
//        foreach($userAuxi as $key=>$value){
//            echo ($key).' -> /'.$value.'</br>';

//            if($key == $i){
//                echo ($key+1).' -> '.$value.'</br>';
//                $i = $i +7;
//            }
//
//        }

//        dd($userAuxi);

//
//        foreach ($crawler as $domElement) {
////            var_dump($domElement);
//        }


//        $validateUser = App::make('ValidateRepository');
//        $user = App\User::findOrNew(1);
//
//        $userRepository = $user->userRepository->first();
//        $userRepository->repository_id = '7';
//
////        dd($userRepository);
//
//        $resp = $validateUser->validate($userRepository);
//
//        dd($resp);
//        return $resp.'';
    }
}
