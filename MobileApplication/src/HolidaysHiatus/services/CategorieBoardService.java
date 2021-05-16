package HolidaysHiatus.services;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;

import com.codename1.io.CharArrayReader;
import com.codename1.io.ConnectionRequest;
import com.codename1.io.JSONParser;
import com.codename1.io.NetworkEvent;
import com.codename1.io.NetworkManager;
import com.codename1.ui.events.ActionListener;

import HolidaysHiatus.tools.Statics;
import HolidaysHiatus.entities.Board;
import HolidaysHiatus.entities.CategorieBoard;

public class CategorieBoardService {
    public ArrayList<CategorieBoard> Catboards;

    public static CategorieBoardService instance;
    //private ConnectionRequest req ;

    /*public AideService()
    { req = new ConnectionRequest();
    }*/
    public boolean resultOK;

    public static CategorieBoardService getInstance() {
        if (instance == null) {
            instance = new CategorieBoardService();
        }
        return instance;
    }

    public ArrayList<CategorieBoard> parseCatBoard(String jsonText) {
        try {
            Catboards = new ArrayList<>();
            JSONParser j = new JSONParser();
            Map<String, Object> tasksListJson = j.parseJSON(new CharArrayReader(jsonText.toCharArray()));

            List<Map<String, Object>> list = (List<Map<String, Object>>) tasksListJson.get("root");
            for (Map<String, Object> obj : list) {
                CategorieBoard c = new CategorieBoard();
                c.setId(((int) Float.parseFloat(obj.get("id").toString())));

                // c.setBoard_id(((int) Float.parseFloat(obj.get("board_id").toString())));
                c.setTitre(obj.get("titre").toString());
                c.setPic(obj.get("lien_icon").toString());

                Catboards.add(c); 
            }

        } catch (IOException ex) {
            ex.getMessage();

        }
        return Catboards;
    }

    public ArrayList<CategorieBoard> getCategorie() {

        String url = Statics.BASE_URL_Categorie_Board + "/AfficherCategorieMobile/";
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
            	Catboards = parseCatBoard(new String(req.getResponseData()));
            

                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
   
        return Catboards;
    }
    public void SupprimerCategorieBoard(CategorieBoard c) {	
        String url = Statics.BASE_URL_Categorie_Board + "/SupprimerCategorieMobile/" +c.getId();
        
       
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);

        NetworkManager.getInstance().addToQueueAndWait(req);

    }
    public void ModifierCategorieBoard(CategorieBoard b) {	
        String url = Statics.BASE_URL_Categorie_Board + "/ModifierCategorieBoard/" + b.getTitre() + "/" +b.getPic()+"/"+b.getId();
        
      
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);

        NetworkManager.getInstance().addToQueueAndWait(req);

    }
}
