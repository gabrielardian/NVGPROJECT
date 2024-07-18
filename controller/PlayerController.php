<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Player;
use App\Team;
use App\Tanding;
use App\Tournament;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Player::all();

        return view('pages.admin.player.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tournaments = Tournament::all();

        return view('pages.admin.player.create',[
            'tournaments' => $tournaments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $team =  Team::create([
            'nama'    => $request->nama,
            'email'    => $request->email,
            'discord'    => $request->discord,
            'no_hp'    => $request->no_hp
        ]);

        Player::create([
            'id_team' => $team->id,
            'player1'    => $request->player1,
            'level1'    => $request->level1,
            'player2'    => $request->player2,
            'level2'    => $request->level2,
            'player3'    => $request->player3,
            'level3'    => $request->level3,
            'player4'    => $request->player4,
            'level4'    => $request->level4,
            'player5'    => $request->player5,
            'level5'    => $request->level5
        ]);

        Tanding::create([
            'id_tournament'    => $request->id_tournament,
            'id_team'    => $team->id
        ]);

        return redirect()->route('player.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Player::with('teams')->findOrFail($id);
        //var_dump($item);

        return view('pages.admin.player.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $team = Team::find($id);
        $team = Team::where('id',$id)->first();
        $team->nama = $request->input('nama');
        $team->email = $request->input('email');
        $team->discord = $request->input('discord');
        $team->no_hp = $request->input('no_hp');
        if($team->save())
        {
            $player = Player::find($id);
            $player = Player::where('id',$id)->first();
            $player->id_team = $team->id;
            $player->player1 = $request->input('player1');
            $player->level1 = $request->input('level1');
            $player->player2 = $request->input('player2');
            $player->level2 = $request->input('level2');
            $player->player3 = $request->input('player3');
            $player->level3 = $request->input('level3');
            $player->player4 = $request->input('player4');
            $player->level4 = $request->input('level4');
            $player->player5 = $request->input('player5');
            $player->level5 = $request->input('level5');
            $player->save();
        }
        return redirect()->route('player.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Player::findOrFail($id);
        $item->delete();

        return redirect()->route('player.index');
    }
}
