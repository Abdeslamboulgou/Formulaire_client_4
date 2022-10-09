<?php

namespace App\Http\Controllers\Api\v1a;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Formulaire_user;

class formulaireController extends Controller
{


  /**
   * Store a newly created resource in storage.
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    try {

      $formulaire = new Formulaire_user();
      $formulaire->type= $request->input('type');
      $formulaire->firstName = $request->input('firstName');
      $formulaire->lastName = $request->input('lastName');
      $formulaire->email = $request->input('email');
      $formulaire->codePostal = $request->input('codePostal');
      $formulaire->city = $request->input('city');
      $formulaire->adress = $request->input('adress');
      $formulaire->message = $request->input('message');
      $formulaire->uid = str_replace('-', '', Str::uuid());
      $formulaire->save();
      return response()->json(['formulaire' => $formulaire,], 201);
      
    } catch (Exception $ex) {
      return response()->json(['error' => "Can't create this formulaire",], 500);
    }
  }


  public function index(Request $request)
  {
      try
      {
          $formulaires = Formulaire_user::all();
          if (empty($formulaires))
          {
              return response()->json([
                  'error' => "Empty list formulaires",
              ], 404);
          }

          return response()->json([
              'formulaires'  => $formulaires,
          ], 200);

      } catch (Exception $ex) {
          return response()->json([
              'error' => "Can't list all formulaires",
          ], 500);
      }
  }

  public function destroy($uid)

  {

    try {

      $formulaire = Formulaire_user::where('uid', '=', $uid)->first();

      if (!($formulaire)) {

        return response()->json(['error' => "Can't find formulaire with uid " . $uid,],
404);

      }

      if ($formulaire->delete()) {




        return response()->json(['message' => "The formulaire $formulaire->uid
has successfully been deleted.",], 200);

      } else {

        return response()->json(['error' => "Database error : can't delete formulaire with uid " . $uid,],
500);

      }

    } catch (Exception $ex) {

      return response()->json(['error' => "Can't delete this formulaire",], 500);

    }

  }

}
