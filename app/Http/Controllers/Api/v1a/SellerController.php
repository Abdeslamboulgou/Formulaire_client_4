<?php

namespace App\Http\Controllers\Api\v1a;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Seller;

class SellerController extends Controller
{


  /**
   * Store a newly created resource in storage.
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function sellerStore(Request $request)
  {

    try {

      $seller = new Seller();
      $seller->email = $request->input('email');
      $seller->hasSite = $request->input('hasSite');
      $seller->negoSite = $request->input('negoSite');
      $seller->teamContact = $request->input('teamContact');
      $seller->adressUrl = $request->input('adressUrl');
      $seller->uid = str_replace('-', '', Str::uuid());
      $seller->save();
      return response()->json(['seller' => $seller,], 201);
      
    } catch (Exception $ex) {
      return response()->json(['error' => "Can't create this seller",], 500);
    }
  }

  public function index(Request $request)
  {
      try
      {
          $sellers = Seller::all();
          if (empty($sellers))
          {
              return response()->json([
                  'error' => "Empty list sellers",
              ], 404);
          }

          return response()->json([
              'sellers'  => $sellers,
          ], 200);

      } catch (Exception $ex) {
          return response()->json([
              'error' => "Can't list all sellers",
          ], 500);
      }
  }
  public function destroy($uid)
    {
        try {
            $seller = Seller::where('uid','=',$uid)->first();
            if (!($seller))
            {
                return response()->json([
                    'error' => "Can't find seller with uid ".$uid,
                ], 404);
            }
            if ($seller->delete())
            {
                return response()->json([
                    'message'  => "The seller $seller->uid has successfully been deleted.",
                ], 200);
            } else
            {
                return response()->json([
                    'error' => "Database error : can't delete seller with uid ".$uid,
                ], 500);
            }

        } catch (Exception $ex) {
            return response()->json([
                'error' => "Can't delete this seller",
            ], 500);
        }
    }
}
