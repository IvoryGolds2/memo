<?php
header('Content-Type: application/json');

$url = 'http://openapi.epost.go.kr/postal/retrieveNewAdressAreaCdService/retrieveNewAdressAreaCdService/getNewAddressListAreaCd'; // XML 데이터를 가져올 URL
$params = [
    'ServiceKey' => $_GET['ServiceKey'], // ServiceKey 파라미터 값
    'srchwrd' => $_GET['srchwrd'], // 검색어 파라미터 값
    'searchSe' => $_GET['searchSe'] // 검색구분 파라미터 값
];

$urlWithParams = $url . '?' . http_build_query($params);

$response = file_get_contents($urlWithParams);

if ($response === false) {
	echo json_encode(['error' => 'XML 데이터를 가져오는데 실패했습니다.']);
} else {
	$xml = new SimpleXMLElement($response);

	$fields = [];
	foreach ($xml->newAddressListAreaCd as $field) {
		$fieldArray = [];
		foreach ($field as $key => $value) {
			$fieldArray[$key] = (string) $value;
		}
		$fields[] = $fieldArray;
	}
	echo json_encode($fields);
}
?>
