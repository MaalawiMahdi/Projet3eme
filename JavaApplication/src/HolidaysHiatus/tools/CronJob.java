/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.tools;

/**
 *
 * @author ASUS
 */
			
import java.util.Date;
import java.util.TimerTask;

public class CronJob extends TimerTask {
    public static boolean flag=true;
    
  @Override
  public void run() {
   System.out.println("Debut execution tache " + new Date());
   System.out.println("flag init " + flag);
    try {
        flag=false;
      System.out.println("before sleep  " + flag);

        Thread.sleep(6000);
    } catch (InterruptedException e) {
      e.printStackTrace();
    }
    System.out.println("Fin execution tache " + new Date());
    CronJob.flag=true;
    
      System.out.println("after sleep  " + flag);

  }
}