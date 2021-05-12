package HolidaysHiatus.gui;

import com.codename1.ui.Button;
import com.codename1.ui.Dialog;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.TextField;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.util.Resources;

import HolidaysHiatus.entities.Board;
import HolidaysHiatus.entities.CategorieBoard;
import HolidaysHiatus.services.BoardService;
import HolidaysHiatus.services.CategorieBoardService;

public class ModifierCategorieForm extends Form{
	private Resources theme;
	private CategorieBoard b=new CategorieBoard();
	  public ModifierCategorieForm(String title, Resources theme,CategorieBoard b) {
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
			CategorieBoardService ss = new CategorieBoardService();

			Label Titre=new Label("Titre");
		    TextField t=new TextField(b.getTitre(),"titre");
		    Label cat=new Label("description");
		    TextField d=new TextField(b.getPic(),"description");
		    Button btn=new Button("Modifer Board");
		    this.getToolbar().addCommandToLeftBar("Retour",null,(evt)->{
	        	
	        	  FormCatBoard f = new FormCatBoard("Categorie Boards",theme);
	              f.show();        });
		    this.add(Titre).add(t).add(cat).add(d).add(btn);

		    btn.addActionListener((evt)->{
		    	b.setTitre(t.getText());
		    	b.setPic(d.getText());
	ss.ModifierCategorieBoard(b);
	Dialog.show("Succees", "Votre Categorie a ete Modifier avec succees ", "OK", null);
	FormCatBoard f = new FormCatBoard("Tous les Categories",theme);
    f.show();
		    });
		
		}



}
