/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.tools.Statics;
import HolidaysHiatus.entities.Commentaire;
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
public class CommentaireService {

    public ArrayList<Commentaire> cmnts;

    public static CommentaireService instance;
    //private ConnectionRequest req ;

    /*public AideService()
    { req = new ConnectionRequest();
    }*/
    public boolean resultOK;

    public static CommentaireService getInstance() {
        if (instance == null) {
            instance = new CommentaireService();
        }
        return instance;
    }

    public ArrayList<Commentaire> parseCommentaire(String jsonText) {
        try {
            cmnts = new ArrayList<>();
            JSONParser j = new JSONParser();
            Map<String, Object> tasksListJson = j.parseJSON(new CharArrayReader(jsonText.toCharArray()));
            List<Map<String, Object>> list = (List<Map<String, Object>>) tasksListJson.get("root");
            for (Map<String, Object> obj : list) {
                Commentaire c = new Commentaire();
                c.setId(((int) Float.parseFloat(obj.get("id").toString())));
                c.setUser_id(((int) Float.parseFloat(obj.get("user_id").toString())));
                c.setUser_mail(obj.get("user_mail").toString());
                 c.setSujet_id(((int) Float.parseFloat(obj.get("sujet_id").toString())));
                c.setCom(obj.get("com").toString());
                cmnts.add(c);
            }

        } catch (IOException ex) {
            ex.getMessage();
        }
        return cmnts;
    }

    public ArrayList<Commentaire> getCommentaireParSujet(int i) {

        String url = Statics.BASE_URL_Commentaire + "/AfficherCommentaireMobile/" + i;
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                cmnts = parseCommentaire(new String(req.getResponseData()));


                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        System.out.println(cmnts);
        return cmnts;
    }

    public boolean addCmnt(Commentaire u) {
        String url = Statics.BASE_URL_Commentaire + "/addCommentaireMobile/" + u.getSujet_id() + "/" + u.getUser_id() + "/" + u.getCom();
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

    public boolean deleteCmnt(Commentaire u) {
        String url = Statics.BASE_URL_Commentaire + "/deleteCommentaireMobile/" + u.getId();

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

    public boolean updateCmnt(Commentaire u) {
        String url = Statics.BASE_URL_Commentaire + "/updateCommentaireMobile/" + u.getId() + "/" + u.getCom();
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
