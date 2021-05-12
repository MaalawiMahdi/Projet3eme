package HolidaysHiatus.gui;

import com.codename1.ui.Button;
import com.codename1.ui.Dialog;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.TextField;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.util.Resources;

import HolidaysHiatus.entities.Board;
import HolidaysHiatus.services.BoardService;

public class ModifierBoardForm extends Form{
	private Resources theme;
	private Board b=new Board();
	  public ModifierBoardForm(String title, Resources theme,Board b) {
	        super(title, BoxLayout.y());
	        this.theme = theme;
	        this.b=b;
	        addGUIs();
	        addActions();
	    }
	private void addActions() {
		// TODO Auto-generated method stub
		
	}
	private void addGUIs() {
		// TODO Auto-generated method stub
      BoardService ss = new BoardService();

		Label Titre=new Label("Titre");
	    TextField t=new TextField(b.getTitre(),"titre");
	    Label cat=new Label("categorie");
	    TextField p=new TextField(String.valueOf(b.getCategorie_id()),"categorie");
	    Label desc=new Label("decription");
	    TextField d=new TextField(b.getPic(),"description");
	    
	    Button btn=new Button("Modifer Board");
	    Button btns=new Button("Supprimer ce Board");

	    this.add(Titre).add(t).add(cat).add(p).add(desc).add(d).add(btn).add(btns);

	    btn.addActionListener((evt)->{
	    	b.setTitre(t.getText());
	    	b.setCategorie_id((int)Integer.parseInt(p.getText()));
	    	b.setPic(d.getText());
ss.ModifierBoard(b);
Dialog.show("Succees", "Votre Board a ete Modifier avec succees ", "OK", null);

	    });
	    btns.addActionListener((evt)->{
	    	ss.SupprimerBoard(b);
	    	Dialog.show("Succees", "Votre Board a ete supprimer avec succees ", "OK", null);

	    });
	}

}
