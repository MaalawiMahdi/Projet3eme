/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.entities.Societe;
import HolidaysHiatus.entities.User;
import HolidaysHiatus.tools.Statics;
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
 * @author mahdi
 */
public class SocieteService {

    public ArrayList<Societe> Societes;

    public void addSociete(Societe s) {

        String url = Statics.BASE_URL_Societe + "/AddSocieteMobile/" + s.getUseraccount_id() + "/" + s.getNumregistre() + "/" + s.getNom() + "/" + s.getType() + "/" + s.getAdresse();
        System.out.print(url);
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);

        NetworkManager.getInstance().addToQueueAndWait(req);

    }

    public ArrayList<Societe> parseSocietes(String jsonText) {
        try {
            Societes = new ArrayList<>();
            JSONParser j = new JSONParser();
            Map<String, Object> tasksListJson = j.parseJSON(new CharArrayReader(jsonText.toCharArray()));

            List<Map<String, Object>> list = (List<Map<String, Object>>) tasksListJson.get("root");
            for (Map<String, Object> obj : list) {
                Societe sdata = new Societe();

                sdata.setId((int) Float.parseFloat(obj.get("id").toString()));
                sdata.setUseraccount_id((int) Float.parseFloat(obj.get("useraccount_id").toString()));
                sdata.setNumregistre(obj.get("numregistre").toString());
                sdata.setType(obj.get("type").toString());
                sdata.setAdresse(obj.get("adresse").toString());
                sdata.setEtat(obj.get("etat").toString());
                sdata.setNom(obj.get("nom").toString());
                Societes.add(sdata);
            }

        } catch (IOException ex) {
            ex.getMessage();
        }
        return Societes;
    }

    public ArrayList<Societe> getSocietes() {

        String url = Statics.BASE_URL_Societe + "/AfficherSocietesMobile";
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                Societes = parseSocietes(new String(req.getResponseData()));

                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return Societes;
    }

    public boolean isExiste(int useraccount_id) {
        List<Societe> s = getSocietes();
        boolean test = false;
        int i;
        for (i = 0; i < s.size(); i++) {
            if (s.get(i).getUseraccount_id() == useraccount_id) {
                test = true;
            }
        }
        return test;
    }

    public Societe getSocieteByUserId(int useraccount_id) {
        List<Societe> s = getSocietes();
        int i;
        for (i = 0; i < s.size(); i++) {
            if (s.get(i).getUseraccount_id() == useraccount_id) {
                return s.get(i);
            }
        }
        return null;
    }

    public Societe getSocieteById(int id) {
        List<Societe> s = getSocietes();
        int i;
        for (i = 0; i < s.size(); i++) {
            if (s.get(i).getId() == id) {
                return s.get(i);
            }
        }
        return null;
    }

    public void update(Societe s) {
        String url = Statics.BASE_URL_Societe + "/EditSocieteMobile/" + s.getId()+ "/" + s.getNumregistre() + "/" + s.getNom() + "/" + s.getType() + "/" + s.getAdresse();
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        NetworkManager.getInstance().addToQueueAndWait(req);
   
    }

}
