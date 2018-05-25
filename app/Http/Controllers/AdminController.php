<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supervisor;
use App\SupervisorKey;
use App\SupervisorStore;
use App\Store;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // Get all supervisors
        $supervisors = Supervisor::all();

        return view('admin', ['supervisors' => $supervisors]);
    }

    public function report()
    {

        /**
         * id
         * store name
         * type of store: host , surrounding(15miles), general(> 15miles)
         * store region
         * if surrounding (host id)
         * if surrounding(distance in miles to host store)
         */

         /**
          * total hosts
          * total surrounding stores
          * total general stores
          */


        //get all stores
        $stores = Store::all();

        //get all host stores
        $hosts = SupervisorStore::all();

        //make sure the host are unique
        $hosts = ($hosts->unique(function ($item) {
            return $item['store_id'];
        }));

        $storeArray = [];

        //go through all the stores
        foreach($stores as $store){
            $id = $store->id;
            $name = $store->name;
            $region = $store->region;

            //store type General by default
            $type = 'General';

            //if current store is a host
            if($store->host->count() > 0){
                $type = 'Host';
            }

            $distance = 0;
            $host_id = 0;

            //if store isnt a host
            if($type != 'Host'){
                //go through all hosts and calculate distance
                foreach($hosts as $host){
                    //get distance from current store and host store
                    $newDistance = $this->distance($host->store->latitude,
                                                $host->store->longitude,
                                                $store->latitude,
                                                $store->longitude);

                    //make sure distance is max of 15 miles
                    if($newDistance <= 15){
                        //make sure old distance is either 0 or old distance is greater than new distance
                        if($distance == 0 || $distance > $newDistance){
                            $distance = $newDistance;
                            $host_id = $host->store->id;
                            $type = 'Surrounding';
                        }
                    }
                }
            }

            //save store info into array
            $storeArray[] = array(
                'id' => $id,
                'name' => $name,
                'region' => $region,
                'type' => $type,
                'distance' => $distance,
                'host_id' => $host_id
            );

        }

        //turn array into collection for easier grouping and count
        $collection =  collect($storeArray);

        $grouped = $collection->groupBy(function ($item, $key) {
            return $item['type'];
        });


        $typesCount = $grouped->map(function ($item, $key) {
            return collect($item)->count();
        });

        return view('report', ['stores' => $collection->all(), 'typesTotal' => $typesCount]);
    }

    //code comes from https://stackoverflow.com/a/11178145
    private function distance($lat1, $lon1, $lat2, $lon2) {

        $pi80 = M_PI / 180;
        $lat1 *= $pi80;
        $lon1 *= $pi80;
        $lat2 *= $pi80;
        $lon2 *= $pi80;

        $r = 6372.797; // mean radius of Earth in km
        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;
        $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $km = $r * $c;

        //return miles
        return $km * 0.62137119;
    }
}
