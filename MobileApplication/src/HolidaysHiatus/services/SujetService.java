/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.tools.Statics;
import HolidaysHiatus.entities.Sujet;
import com.codename1.io.CharArrayReader;
import com.codename1.io.ConnectionRequest;
import com.codename1.io.JSONParser;
import com.codename1.io.NetworkEvent;
import com.codename1.io.NetworkManager;
import com.codename1.ui.events.ActionListener;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;

/**
 *
 * @author hp
 */
public class SujetService {

    public ArrayList<Sujet> sujets;

    public static SujetService instance;
    //private ConnectionRequest req ;

    /*public AideService()
    { req = new ConnectionRequest();
    }*/
    public boolean resultOK;

    public static SujetService getInstance() {
        if (instance == null) {
            instance = new SujetService();
        }
        return instance;
    }

    public ArrayList<Sujet> parseSujet(String jsonText) {
        try {
            sujets = new ArrayList<>();
            JSONParser j = new JSONParser();
            Map<String, Object> tasksListJson = j.parseJSON(new CharArrayReader(jsonText.toCharArray()));

            List<Map<String, Object>> list = (List<Map<String, Object>>) tasksListJson.get("root");
            for (Map<String, Object> obj : list) {
                Sujet c = new Sujet();
                c.setId(((int) Float.parseFloat(obj.get("id").toString())));
                c.setBoard_id(((int) Float.parseFloat(obj.get("board_id").toString())));

                // c.setBoard_id(((int) Float.parseFloat(obj.get("board_id").toString())));
                c.setTitre(obj.get("titre").toString());
                c.setDescription(obj.get("description").toString());
                c.setLien_image(obj.get("lien_image").toString());

                sujets.add(c);
            }

        } catch (IOException ex) {
            ex.getMessage();

        }
        return sujets;
    }

    public ArrayList<Sujet> getSujetParBoard(int i) {

        String url = Statics.BASE_URL_Sujet + "/AfficherSujetMobile/" + i;
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                sujets = parseSujet(new String(req.getResponseData()));
             

                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
      
        return sujets;
    }
    
    public boolean addSujet(Sujet u) {
        String url = Statics.BASE_URL_Sujet + "/addSujetMobile/" + u.getBoard_id() + "/" + u.getTitre() + "/" + u.getDescription() + "/" + u.getLien_image();
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOK = req.getResponseCode() == 200;
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return resultOK;
    }
    
    public boolean deleteSujet(Sujet u) {
        String url = Statics.BASE_URL_Sujet + "/deleteSujetMobile/" + u.getId();
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOK = req.getResponseCode() == 200;
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return resultOK;
    }
    
    public boolean updateSujet(Sujet u)
    {
        String url = Statics.BASE_URL_Sujet + "/updateSujetMobile/" + u.getId() +"/" + u.getTitre() +"/" + u.getDescription();
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOK = req.getResponseCode() == 200;
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return resultOK;
    }
}
