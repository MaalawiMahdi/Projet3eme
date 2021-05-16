package HolidaysHiatus.gui;

import com.codename1.notifications.LocalNotification;
import com.codename1.notifications.LocalNotificationCallback;
import com.codename1.ui.Button;
import com.codename1.ui.Dialog;
import com.codename1.ui.Display;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.TextField;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.util.Resources;

import HolidaysHiatus.entities.Board;
import HolidaysHiatus.services.BoardService;
import HolidaysHiatus.tools.Session;

public class AjouterBoardForm extends Form  {
	private Resources theme;
	  public AjouterBoardForm(String title, Resources theme) {
	        super(title, BoxLayout.y());
	        this.theme = theme;
	        addGUIs();
	        addActions();
	        
	    }
	private void addActions() {
		// TODO Auto-generated method stub
		
	}
	private void addGUIs() {
		// TODO Auto-generated method stub
        BoardService ss = new BoardService();
        Board b = new Board();

		Label Titre=new Label("Titre");
	    TextField t=new TextField(null,"Titre");
	    Label cat=new Label("categorie");
	    TextField p=new TextField(null,"categorie");
	    Label desc=new Label("decription");
	    TextField d=new TextField(null,"description");
	    
	    Button btn=new Button("Ajouter Board");
	    this.add(Titre).add(t).add(cat).add(p).add(desc).add(d).add(btn);

	    btn.addActionListener((evt)->{
	    	b.setTitre(t.getText());
	    	b.setCategorie_id((int)Integer.parseInt(p.getText()));
	    	b.setPic(d.getText());
                b.setSociete_id(Session.getSession().getSessionSociete().getId());
ss.AjouterBoard(b);
Dialog.show("Succees", "Votre Board a ete Ajouter avec succees ", "OK", null);
  Session.getSession().setConnectedBoard(BoardService.getInstance().GetBoardByIdSociete(Session.getSession().getSessionSociete().getId()));
new HomePageSocieteForm().show();
notification();
	    });
	}
	public void notification() {
	      LocalNotification n = new LocalNotification();
	        n.setId("demo-notification");
	        n.setAlertBody("It's time to take a break and look at me");
	        n.setAlertTitle("Break Time!");
	        n.setAlertSound("/notification_sound_bells.mp3"); //file name must begin with notification_sound


	        Display.getInstance().scheduleLocalNotification(
	                n,
	                System.currentTimeMillis() + 10 * 1000, // fire date/time
	                LocalNotification.REPEAT_MINUTE  // Whether to repeat and what frequency
	        );
	      
		
	}


}
