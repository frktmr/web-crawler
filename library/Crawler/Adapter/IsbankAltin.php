<?php
class Crawler_Adapter_IsbankAltin extends Crawler_Adapter_Abstract implements Crawler_Adapter_Interface
{
  /**
  * returns parsed data
  * @param string $contents
  * @return array
  */
  private function parseData($contents)
  {
    $name = 'Altın';

    $var = explode('<td style="color:#5F5E5E; line-height:12px;padding-left:5px;">Altın</td>', $contents);
    $var = explode('<td colspan="3" style="color:#5481AC;text-align:center;">', $var[1]);
    $var = explode('</td>', $var[1]);
    $price = (float) str_replace(',', '.', $var[0]);
    $currency = 'TL';
    $image = false;

    return array(
        'name' => $name,
        'price' => $price,
        'currency' => $currency,
        'image_url' => $image
    );
  }

  /**
  * runs crawler and returns parsed data.
  * @param string $url
  * @return array
  */
  public function run($url)
  {
    $contents = $this->_fetchData($url);
    $data = $this->parseData($contents);
    return $data;
  }
}
?>
