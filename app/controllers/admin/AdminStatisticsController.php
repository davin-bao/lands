<?php
/**
 * Created by PhpStorm.
 * User: davin.bao
 * Date: 14-5-12
 * Time: 下午1:08
 */
use DavinBao\Statistics\StatisticsStatistic;
use DavinBao\Statistics\HasStatisticsController;

class AdminStatisticsController extends AdminController {
  use HasStatisticsController;

  public function __construct(){
  }

  public function getIndex(){
    var_dump(StatisticsStatistic::all());
  }

  public function getCreate(){}



}