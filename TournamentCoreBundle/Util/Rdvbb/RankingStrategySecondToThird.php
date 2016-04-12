<?php
namespace FantasyFootball\TournamentCoreBundle\Util\Rdvbb;

use FantasyFootball\TournamentCoreBundle\Util\IRankingStrategy;

class RankingStrategySecondToThird implements IRankingStrategy{

  public function useCoachTeamPoints(){
    return false;
  }

  public function computePoints(&$points1,&$points2,$td1,$td2,$cas1,$cas2){
    $points = PointsComputor::win5Draw3SmallLoss1Loss0($td1,$td2,$cas1,$cas2);
    $points1 = $points['points1'];
    $points2 = $points['points2'];
  }
  
  public function compareCoachs($team1,$team2){
    return TeamComparator::pointsOpponentPointsNetTdCasFor($team1,$team2);
  }
    
  public function compareCoachTeams($coachTeam1,$coachTeam2){
    return 0;
  }
    
  public function computeCoachTeamPoints(&$points1,&$points2,$td1Array,$td2Array,$cas1Array,$cas2Array){
    $points1 = 0;
    $points2 = 0;
  }

  public function useOpponentPointsOfYourOwnMatch(){
    return false;   
  }
  
  public function rankingOptions(){
    return array(
      'coach' => array(
        'main' => array('points','opponentPoints','netTd','casualties'),
        'td' => array('td'),
        'casualties' => array('casualties'),
        'comeback' => array('diffRanking','firstDayRanking','finalRanking')
      )
    );
  }
}

?>