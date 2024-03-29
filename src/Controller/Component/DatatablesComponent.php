<?php
/**
 * App\src\Controller\Component\DatatablesComponent.php
 * Don't Remove this signature if you love code 
 * Code For Easy
 * =================================================================
 * Author   : Ardiansyah Iqbal
 * Email    : aiqbalsyah@gmail.com
 * Github   : aiqbalsyah
 */
namespace App\Controller\Component;

use Cake\Controller\Component;

class DatatablesComponent extends Component
{

	public function make($data)
	{
        $conf = [];
		$source  = $data['source'];
		$allData = $data['source'];
		$searchAble = $data['searchAble'];
		$defaultSort = ! empty( $data[ 'defaultSort' ]) ? $data[ 'defaultSort' ] : 'ASC';
		$defaultField = ! empty( $data[ 'defaultField' ]) ? $data[ 'defaultField' ] : '';
        $defaultSearch = ! empty( $data[ 'defaultSearch' ]) ? $data[ 'defaultSearch' ] : '';
        if(!empty($data['contain'])){
            $conf['contain'] = $data['contain'];
        }
		if(! empty($defaultSearch))
		{
            $defaultWhere = [];
			foreach ($defaultSearch as $key => $condition) {
                $defaultWhere[] = [
                    $condition['keyField'].' '.$condition['condition'] => $condition['value']
                ];
            }
            if(!empty($defaultWhere))
            {
                $conf['conditions'] = $defaultWhere;
            }
		}
		$request = $this->request->data;
		$datatable = ! empty( $request ) ? $request : array();
		// pr($request);;
		$datatable = array_merge( array( 'pagination' => array(), 'sort' => array(), 'query' => array() ), $datatable );

		$sort  = $defaultSort;

		$meta    = array();


		$metaData = $source->find('all',$conf);

		if(!empty($datatable['order'])){
			foreach($datatable['order'] as $sd => $or){
				$col_index = $or['column'];
				if($datatable['columns'][$col_index]['orderable'] == "true"){
					$metaData->order([$datatable['columns'][$col_index]['name'] => $or['dir']]);
				}
			}
		}

		foreach ($datatable['columns'] as $key => $row) {
			if($row['searchable'] == "true"){
				if(!empty($row['search']['value'])){
					if($row['search']['regex'] == 1){
						$metaData->where([$row['name'].'' => $row['search']['value']]);
					}else{
						$metaData->where([$row['name'].' LIKE' => '%'.$row['search']['value'].'%']);
					}
					
				}
			}
				
		}
		if($datatable['search']['value']) {
		//	dd($filter);
            $orWhere = []; 
            foreach ($datatable['columns'] as $key => $value) {
				if($value['searchable'] == "true"){
					$metaData->orWhere([$value['name'].' LIKE' => '%'.$datatable['search']['value'].'%']);
				}
            }
		}
		if(!empty($data['having'])){
            $metaData = $metaData->having($data['having']);
        }
		if(!empty($data['fields'])){
			foreach($data['fields'] as $r){
				$metaData->select($r);
			}
		}
		$dataResult = $metaData;
		$dataCount = $metaData;

		$pages = 1;
		if(isset($data['union'])){
			$total = 0;
		}else{
			$total 	 = $dataCount->count();
		}

		$start    	= $datatable[ 'start' ];
		$length 	= $datatable[ 'length' ];
		$dataResult = $dataResult->limit($length)->offset($start);

		//dd($datatable);
		// $request = $this->request->all();
		// dd($request);		
		$meta = array(
		);
		//pr($conf);
		$result = array(
			'meta' => $meta + array(
					'sql' => $dataResult->sql()
				),
			'aaData' => $dataResult,
			'iTotalRecords' => $total,
			'iTotalDisplayRecords' => $total,
			'sColumns' => "",
			'sEcho' => 0,
        );
		return $result;

	}

}

?>