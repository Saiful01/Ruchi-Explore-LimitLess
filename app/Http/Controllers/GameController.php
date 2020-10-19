<?php

namespace App\Http\Controllers;

use App\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class GameController extends Controller
{

    public function spotGameResult()
    {
        return view('common.pages.game.spot_difference.result');
    }

    public function gameResult1()
    {
        $result = Score::orderBy('scores.score', 'DESC')
            ->join('users', 'users.id', '=', 'scores.gamer_id')
            ->where('scores.game_id', 1)
            ->get();
        return view('Admin.game.game1')->with('result', $result);
    }

    public function leaderboard($id)
    {
        $results = Score::orderBy('scores.score', 'DESC')
            ->join('users', 'users.id', '=', 'scores.gamer_id')
            ->where('scores.game_id', 1)
            ->limit(5)->get();
        return view('common.pages.game.photo_game.leader')
            ->with('id', $id)
            ->with('results', $results);
    }

    public function leader($id)
    {
        $results = Score::orderBy('scores.score', 'DESC')
            ->join('users', 'users.id', '=', 'scores.gamer_id')
            ->where('scores.game_id', 2)
            ->limit(5)->get();
        return view('common.pages.game.spot_difference.leader')
            ->with('id', $id)
            ->with('results', $results);
    }

    public function gameResult2()
    {
        $result = Score::orderBy('scores.score', 'DESC')
            ->join('users', 'users.id', '=', 'scores.gamer_id')
            ->where('scores.game_id', 2)
            ->get();
        return view('Admin.game.game2')->with('result', $result);
    }

    public function selectScoreSave($score, $time)
    {
        try {
            $game = [
                'score' => $score,
                'mark' => $score,
                'time' => $time,
                'game_id' => 2,
                'gamer_id' => Auth::user()->id,
            ];
            Score::create($game);
        } catch (\Exception $exception) {

        }
    }


    public function spotGameInstruction()
    {

        return view('common.pages.game.spot_difference.instruction');
    }

    public function selectGameInstruction()
    {

        return view('common.pages.game.photo_game.instruction');
    }

    public function spotGame()
    {
        if (!Auth::check()) {

            return Redirect::to('/user/login')->with('failed', "Login to Play Game");
        } else {
            return view('common.pages.game.spot_difference.game3');
        }


    }

    public function selectImageResult()
    {
        return view('common.pages.game.photo_game.result');
    }

    public function selectImageResultSave(Request $request)
    {

        $wrong_answer = $request['total_wrong_answer'];
        $mark = $request['total_right_answer'];
        $time = $request['total_seconds'];
        $score = $request['total_right_answer'] - $wrong_answer;

        try {
            $is_exist = Score::where('gamer_id', Auth::user()->id)
                ->where('gamer_id', Auth::user()->id)
                ->first();

            if (is_null($is_exist)) {
                Score::create([
                    'gamer_id' => Auth::user()->id,
                    'mark' => $mark,
                    'time' => $time,
                    'score' => $score,
                    'game_id' => $request['game_id'],
                ]);
            } else {
                /*Score::create([
                    'gamer_id' => Auth::user()->id,
                    'mark' => $mark,
                    'time' => $time,
                    'score' => $score,
                ]);*/
            }


            return [
                'status' => 200,
                'message' => "Successfully Saved",
            ];
        } catch (\Exception $exception) {
            return [
                'status' => $exception->getCode(),
                'message' => $exception->getMessage()
            ];
        }
    }

    public function selectImageGame()
    {


        if (!Auth::check()) {

            return Redirect::to('/user/login')->with('failed', "Login to Play Game");
        } else {
            $is_exist = Score::where('gamer_id', Auth::user()->id)
                ->where('gamer_id', Auth::user()->id)
                ->first();
            /*if (!is_null($is_exist)) {

                return Redirect::to('/game/image-select/result')->with('failed', "Already Played");
            }*/
        }

        $questions = [

            [
                'question' => "Choose all Sundarban Photos",
                'code' => "C1001"
            ],
            [
                'question' => "Choose all Sajek Photos",
                'code' => "C1002"
            ],
            [
                'question' => "Choose all Lalakhal Photos",
                'code' => "C1003"
            ],
            [
                'question' => "Choose all Jaflong Photos",
                'code' => "C1004"
            ],
            [
                'question' => "Choose all Coxs-Bazar Photos",
                'code' => "C1005"
            ],
            [
                'question' => "Choose all Bichanakandi Photos",
                'code' => "C1006"
            ],
            [
                'question' => "Choose all Bogalake Photos",
                'code' => "C1007"
            ],
            [
                'question' => "Choose all Kaptai Photos",
                'code' => "C1008"
            ],
            [
                'question' => "Choose all Nilgiri Photos",
                'code' => "C1009"
            ],
            [
                'question' => "Choose all Tanguar Haor Photos",
                'code' => "C1010"
            ]
        ];
        $results = [];
        $j = 0;
        /* foreach ($questions as $question) {
             array_push($results, [
                 'id' => Str::uuid(),
                 'code' => $question['code'],
                 'question' => $question['question'],
                 'options' => $this->getCodeWiseOptions($question['code'])
             ]);
         }*/
        $m = rand(0, 5);
        for ($i = $m; $i <= 10; $i++) {
            $j++;
            array_push($results, [
                'id' => Str::uuid(),
                'code' => $questions[$i]['code'],
                'question' => $questions[$i]['question'],
                'options' => $this->getCodeWiseOptions($questions[$i]['code'])
            ]);

            if ($j == 5) {
                break;
            }
        }


        return view('common.pages.game.photo_game.index')->with('results', $results);
    }


// createDataSet
    private function createDataSet(string $filePath)
    {
        $base_asset_path = public_path($filePath);
        $files = File::files($base_asset_path);
        #$getRelativePathname =  $files[0]->getRelativePathname();

        $result = [];
        foreach ($files as $file) {
            $image_name = $file->getFilename();
            $code = explode('-', $image_name)[0];
            array_push($result, [

                'id' => Str::uuid(),
                'code' => $code,
                'name' => $file->getFilename(),
                'image_url' => $base_asset_path . '/' . $file->getFilename(),
                'relative_path' => $filePath . '/' . $file->getFilename(),
            ]);
        }
        return $result;
    }

    private function getCodeWiseOptions($code)
    {

        $CDir = '/images/game/correct';
        $WDir = '/images/game/wrong';
        $correctImageList = $this->createDataSet($CDir);        #return $correctImageList;
        $wrongImageList = $this->createDataSet($WDir);          #return $wrongImageList;
        $options = [];
        $C1001 = 0;
        $C1002 = 0;
        $C1003 = 0;
        $C1004 = 0;
        $C1005 = 0;
        $C1006 = 0;
        $C1007 = 0;
        $C1008 = 0;
        $C1009 = 0;
        $C1010 = 0;

        foreach ($correctImageList as $correctImage) {
            $random = $this->getRandomValue();
            error_log("Log" . $C1001 . "--" . $random);
            if ($correctImage['code'] == $code) {

                if ($code == "C1001") {

                    if ($C1001 < 3) {

                        $C1001++;
                        //error_log("Log".$C1001."--".$random);
                        if ($random % 2 == 0) {
                            array_push($options, $correctImage);
                            array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]);
                        } else {
                            array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]);
                            array_push($options, $correctImage);

                        }

                    }
                }
                if ($code == "C1002") {

                    if ($C1002 < 3) {
                        $C1002++;
                        array_push($options, $correctImage);
                        array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]);
                    }
                }
                if ($code == "C1003") {

                    if ($C1003 < 3) {
                        $C1003++;
                        array_push($options, $correctImage);
                        array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]);
                    }
                }
                if ($code == "C1004") {

                    if ($C1004 < 3) {
                        $C1004++;
                        array_push($options, $correctImage);
                        array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]);
                    }
                }
                if ($code == "C1005") {

                    if ($C1005 < 3) {
                        $C1005++;
                        array_push($options, $correctImage);
                        array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]);
                    }
                }
                if ($code == "C1006") {

                    if ($C1006 < 3) {
                        $C1006++;
                        array_push($options, $correctImage);
                        array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]);
                    }
                }
                if ($code == "C1007") {

                    if ($C1007 < 3) {
                        $C1007++;
                        array_push($options, $correctImage);
                        array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]);
                    }
                }
                if ($code == "C1008") {

                    if ($C1008 < 3) {
                        $C1008++;
                        array_push($options, $correctImage);
                        array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]);
                    }
                }
                if ($code == "C1009") {

                    if ($C1009 < 3) {
                        $C1009++;
                        array_push($options, $correctImage);
                        array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]);
                    }
                }
                if ($code == "C1010") {

                    if ($C1010 < 3) {
                        $C1010++;
                        array_push($options, $correctImage);
                        array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]);
                    }
                }


            };
        }
        error_log("cat" . $C1001);
        // wrong 3 option choose
        /* array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]);
         array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]);
         array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]);*/
        return $options;


        //Need  Modification
        $CDir = '/images/game/correct';
        $WDir = '/images/game/wrong';
        $correctImageList = $this->createDataSet($CDir);        #return $correctImageList;
        $wrongImageList = $this->createDataSet($WDir);          #return $wrongImageList;


        $options = [];;
        $counter = 0;

        $previous = $this->getRandomValue(0, 3);
        $previous = 0;
        $C1001 = 0;
        $C1002 = 0;
        $C1003 = 0;
        foreach ($correctImageList as $correctImage) {
            $counter = $counter + 1;
            if ($correctImage['code'] == $code) {
                //array_push($relatedList, $correctImage);

                $previous++;
                if ($code == "C1001") {
                    $C1001++;
                    if ($C1001 <= 3) {
                        array_push($options, $correctImageList[$previous]);
                        array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]); // wrong 3 option choose*/
                    }
                }
                if ($code == "C1002") {
                    $C1002++;
                    if ($C1002 <= 3) {
                        array_push($options, $correctImageList[$previous]);
                        array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]); // wrong 3 option choose*/
                    }
                }
                if ($code == "C1003") {
                    $C1003++;
                    if ($C1003 <= 3) {
                        array_push($options, $correctImageList[$previous]);
                        array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]); // wrong 3 option choose*/
                    }
                }

            };
            if ($counter > 3) {
                $counter = 0;
            }


            //break;

        }

        /*$right_index=rand(0, count($relatedList) - 1);
        if($right_index==$previous){
            $right_index = $this->getRandomValue($previous, $relatedList);
        }
        $previous=$right_index;



        array_push($options, $correctImageList[$right_index]);
        array_push($options, $correctImageList[$right_index]);
        array_push($options, $correctImageList[$right_index]);

        array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]); // wrong 3 option choose
        array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]); // wrong 3 option choose
        array_push($options, $wrongImageList[rand(0, count($wrongImageList) - 1)]); // wrong 3 option choose*/


        return $options;
    }

    private function getRandomValue()
    {
        return $my_rand = rand(1, 6);

    }
}
