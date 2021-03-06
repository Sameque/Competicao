<?php

namespace App\Http\Controllers;


use App;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Libraries\CrawlerRepository\RepositoryProblem;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;
use App\Libraries\DateTime\DateTime;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('list.submission');
    }

    public function update($competition_id)
    {
        $competition = App\Competition::findOrNew($competition_id);
        $dateTime = new DateTime();
        $submissionModels='';

        $problemCompetition = $this->getProblemsCompetition($competition_id);
        $usersCompetiton = $this->getUsersCompetition($competition_id);

        //CRIANDO USUÁRIO
        $dateInitial = $dateTime->addTimeInDate($competition->dateBegin,$competition->hoursBegin);

        if(!$usersCompetiton){
            return $usersCompetiton;
        }


        foreach($usersCompetiton as $user){
            //$user->userRepository;

            foreach($user->userRepository as $userRepository){

                $repositoryName = App\Repository::findOrNew($userRepository->repository_id)->name;

                $problems = $this->getProblemInRepository($problemCompetition,$userRepository->repository_id);

//                dd($competition);


//                dd(strtotime($competition->dateBegin) , $competition->hoursBegin);

//                \DateTime::createFromFormat('Y-m-d', substr($domElement->nodeValue, 2,10));



                dd(

                        $competition->dateBegin
                        ,$dateTime->addTimeInDate($competition->dateBegin,$competition->hoursBegin)
                        ,Carbon::createFromTime(10, 23)
                        ,$competition->dateBegin->createFromFormat('d/m/Y', '01/03/2010')
                        ,date('Y-m-d H:i', strtotime('+30 minutes'))
                        ,Carbon::create($competition->dateBegin->year,$competition->dateBegin->month,$competition->dateBegin->day,1,1,1)
                        ,$competition->hoursBegin
                    ,date($competition->dateBegin)
                    ,date($competition->dateBegin)


                );

                if ($problems) {
                    $submission = $this->getProblemUser(
                        $competition->dateBegin,
                        $competition->dateEnd,
                        $repositoryName,
                        $userRepository->username,
                        $problems
                    );
//                    dd($problem['dateHours'],$domElement->nodeValue);

                    if ($submission) {


                        DB::table('submission')
                            ->where('competition_id', '=', $competition->id)
                            ->where('user_id', '=', $user->id)
                            ->delete();

                        foreach ($submission as $item) {

                            $submissionModel = new App\Submission();

                            $submissionModel->date = $item['date'];
                            $submissionModel->hours = $item['hours'];
                            $submissionModel->hours = $dateTime->diffTimeRepository($item['hours'], $repositoryName);
                            $submissionModel->problem = $item['code'];
                            $submissionModel->result = $item['result'];
                            $submissionModel->language = $item['language'];
                            $submissionModel->problem_id = $item['problem_id'];
                            $submissionModel->user_id = $user->id;
                            $submissionModel->competition_id = $competition->id;

                            $submissionModel->save();
                            $submissionModels[] = $submissionModel;

                        }
                    }
                }
            }
        }

        return $submissionModels;

    }

    /**
     * PEGAR TODOS OS PROBLEMAS DA COMPETICAO
     *
     * @param $competition_id
     * @return array|string
     */
    private function getProblemsCompetition($competition_id){

        $competition = App\Competition::findOrNew($competition_id)->problems;

        $problemCompetition = null;
        foreach($competition as $i){
            $register['code'] = $i->code;
            $register['repository_id'] = $i->repository_id;
            $register['id'] = $i->id;
            $problemCompetition[] = $register;
        }
        return $problemCompetition;
    }

    /**
     * PEGAR TODOS OS USUÁRO DA COMPETICAO
     *
     * @param $competition_id
     * @return array|string
     */
    private function getUsersCompetition($competition_id){

        $competition = App\Competition::findOrNew($competition_id)->users;
            
        $usersCompetiton = null;

        foreach($competition as $i){
            $i->userRepository;
            $usersCompetiton[] = $i;
        }

        return $usersCompetiton;
    }

    /**
     * Filtrar os problemas referente ao repositório do usuário repositório "vigente/selecionado"
     *
     * @param $problems
     * @param $repository_id
     * @return array|string
     */
    private function getProblemInRepository($problems,$repository_id){

        $problemsRepository = null;
        foreach($problems as $problem){
            if($problem['repository_id'] == $repository_id){
                $item['code'] = $problem['code'];
                $item['id'] = $problem['id'];
                $problemsRepository[] = $item;
            }
        }
        return $problemsRepository;
    }

    /**
     * @param Date $competitionBegin_dt
     * @param Date $competitionEnd_dt
     * @param int $repository_id
     * @param User $username
     * @param string $problem
     * @return array
     */
    private function getProblemUser(
            $competitionBegin_dt,
            $competitionEnd_dt,
            $repositoryName,
            $username,
            $problems)
    {

        $problemSubmisions = null;

        foreach ((array) $problems as $problem) {
            $problemSubmisions[] = RepositoryProblem::getRepositoryProblem(
                $repositoryName,
                $problem['code'],
                $username);
        }


        /**
         * Anda no array de registros de submissões
         */
        $auxSubmission = array();

        foreach((array) $problemSubmisions as $submisions){

            foreach ((array) $submisions as $submision) {

                foreach ((array) $problems as $problem) {
                    /**
                     * verifica se o respectivo problema pertence a essa competição e se
                     * os registros estão dentro do periodo da competição.
                     */

                        if ( $submision['code'] == $problem['code'] and ($submision['date'] >= $competitionBegin_dt and $submision['date'] <= $competitionEnd_dt)
                    ) {
                        $submision['problem_id'] = $problem['id'];
                        $auxSubmission[] = $submision;

                    }

                }
            }
        }

        return $auxSubmission;
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
//        $html = file_get_contents('http://br.spoj.com/users/moj/');//VALIDATE USER
//        $html = file_get_contents('http://br.spoj.com/status/sameque/');//GET PROBLEM, USER
//        $html = file_get_contents('http://br.spoj.com/problems/BAFO/');//GET PROBLEM, PROBLEM
//        $html = file_get_contents('http://br.spoj.com/status/SOMA,sameque/');//GET SUBMIT, PROBLEM

        //URI
//        $html = file_get_contents('https://www.urionlinejudge.com.br/judge/pt/users/profile/36622/');//Validate User
        $html = file_get_contents('https://www.urionlinejudge.com.br/judge/pt/problems/view/1001/');//Validate Problem
//        $html = file_get_contents('https://www.urionlinejudge.com.br/judge/pt/runs?problem_id=1003');//Problem Solved
dd('teste > crawler');

//        dd($html);
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
//                    <h1 class="456">Samer</h1>
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
//        $crawler = $crawler->filter('body > div > div')->eq(1)->filter('table')->eq(1)->filter('td');//->extract(array('_text', 'href'));//PROBLEM USER
//        $crawler = $crawler->filter('body > div > div > div > div > div > table > tr > td a')->eq(0);//VALIDADE PROMEM 2
//        $crawler = $crawler->filter('body > div > div > div > div > div > div > div h4')->eq(0);//VALIDADE USER 2
//        $crawler = $crawler->filter('body > div > div > div > div > div > form > table > tr > td');////GET SUBMIT, PROBLEM

        //URI
//        $crawler = $crawler->filterXPath('//body/article');//->attr('456');//->filter('body > article')->attr('456');////Validate User
        $crawler = $crawler->filter('form');////Validate User

//
//        $crawler = $crawler->filter('div');
//            ->eq(1)->filter('div > div > table')->eq(0)->filter('tr > td')->eq(1);
//        ('body > div > div')->eq(1)
//        $crawler = $crawler->filter('body > article')->eq(0)->filter('h1')->eq(0);
//        $crawler->addHtmlContent('http://br.spoj.com/');
//        $crawler = $crawler->filter('body > article')->eq(1)->filter('h1')->eq(0);


//        dd($crawler->attr('href'));
//        dd($crawler->attr('class'));
//        dd($crawler->extract(array('_text', 'class')));
        foreach ($crawler as $domElement) {
            echo $domElement->nodeValue.'</br>';
        }

        //
//        $crawler = $crawler->filter('body > div > div')->eq(1);//PROBL//E//M USER
//
//        foreach ($crawler as $key => $domElement) {
//            echo $key.' '.$domElement->nodeValue.'</br>';
//        }


//        echo $crawler->attr('href');
        
//        $url = $crawler->attr('href');
//        $url = substr($url,8,100);
//        $url = substr($url,0,strlen($url)-1);
        
//        echo $url;
        /*
                $i=1;
                $k=2;
                $p=3;
                $y=6;

                $problems = null;

                foreach ($crawler as  $key => $domElement) {

                    echo $key.' => '.$domElement->nodeValue.'<br/>';


                    if ($key == $i){
                        echo 'Data: '.$domElement->nodeValue.'</br>';
                        $i+=7;
                    }

                    if ($key == $k){
                        echo 'Nome: '.$domElement->nodeValue.'</br>';
                        $k+=7;
                        $html2=$domElement->ownerDocument->saveHTML($domElement);
                        $crawler2 = new Crawler($html2);
                        $crawler2 = $crawler2->filter('a');
                        echo 'Code: '.$crawler2->attr('href').'</br>';

                    }

                    if ($key == $p){
                        echo 'Resultado: '.$domElement->nodeValue.'</br>';
                        $p+=7;
                    }

                    if ($key == $y){
                        echo 'Linguagem: '.$domElement->nodeValue.'</br>';
                        $y+=7;
                    }


        //            echo $key.' => '.$domElement->nodeValue.'</br>';
        //            echo $domElement->extract(array('_text', 'href'));
        //            echo $domElement->attr('href');

                }
        */
//        $crawler = $crawler
//            ->filter('body > p')
//            ->reduce(function (Crawler $node, $i) {
//                // filter every other node
//                return ($i % 2) == 0;
//            });

//        $userAuxi='';
//        $i = 2;
//        $y = 1;
//        $k = 3;
//        $j = 6;
//        $w = 2;

//        $crawler = $crawler->filterXPath('//body/article')->extract(array('_text', 'href'));
//        dd($crawler);

//        dd($html);
//        $html2='';
//
//        foreach ($crawler as $key => $domElement) {

//            $html2=$domElement->ownerDocument->saveHTML($domElement);
//            echo $domElement->nodeValue.'</br>';


//            if ($key == $w) {
//
//                $crawler2 = new Crawler($html2);
//                $crawler2 = $crawler2->filter('a');
//                $problem = $crawler2->attr('href');
//
//
//                $problem = substr($problem,10,100);
//
//                $leanString = strlen($problem);
//                $problem = substr($problem,0,$leanString-1);
//
//                echo $problem.'</br>';
//                $w = $w + 7;
//            }
//        }




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
