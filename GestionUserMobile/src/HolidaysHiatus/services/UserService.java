/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.entites.InformationsSupplementaires;
import HolidaysHiatus.entites.User;
import HolidaysHiatus.tools.Statics;
import com.codename1.io.CharArrayReader;
import com.codename1.io.JSONParser;
import com.codename1.io.ConnectionRequest;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;
import com.codename1.ui.events.ActionListener;
import com.codename1.io.NetworkEvent;
import com.codename1.io.NetworkManager;

/**
 *
 * @author mahdi
 */
public class UserService {

    public ArrayList<User> Users;

    public boolean resultOK;
    public Map<String, Object> resultatCnx;

    public ArrayList<User> parseUsers(String jsonText) {
        try {
            Users = new ArrayList<>();
            JSONParser j = new JSONParser();
            Map<String, Object> tasksListJson = j.parseJSON(new CharArrayReader(jsonText.toCharArray()));

            List<Map<String, Object>> list = (List<Map<String, Object>>) tasksListJson.get("root");
            for (Map<String, Object> obj : list) {
                User udata = new User();
                udata.setId((int) Float.parseFloat(obj.get("id").toString()));
                udata.setMail(obj.get("mail").toString());
                udata.setPassword(obj.get("password").toString());
                udata.setType(obj.get("type").toString());

                udata.setActive((obj.get("active").toString()));
                udata.setBan((obj.get("ban").toString()));
                Users.add(udata);
            }

        } catch (IOException ex) {
            ex.getMessage();
        }
        return Users;
    }

    public ArrayList<User> getUsers() {

        String url = Statics.BASE_URL_User + "/AfficherUsers/";
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                Users = parseUsers(new String(req.getResponseData()));

                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return Users;
    }

    public boolean isExiste(String text) {
        List<User> l = getUsers();
        boolean test = false;
        int i;
        for (i = 0; i < l.size(); i++) {
            if (l.get(i).getMail().compareTo(text) == 0) {
                test = true;
            }
        }
        return test;
    }

    public void addUser(User u) {
        String url = Statics.BASE_URL_User + "/AddUserMobile/" + u.getMail() + "/" + u.getPassword();
        System.out.print(url);
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);

        NetworkManager.getInstance().addToQueueAndWait(req);

    }
    public void addUser(User u, InformationsSupplementaires facebookData) {
        String url = Statics.BASE_URL_User + "/AddUserMobileByFacebbok/" + u.getMail() + "/" + u.getPassword()+ "/" +facebookData.getNom() 
                + "/" + facebookData.getPrenom() + "?linkimage=" + facebookData.getImage();
        
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);   
                NetworkManager.getInstance().addToQueueAndWait(req);

    }

    public Map<String, Object> parseConnexion(String jsonText) {
        User u = new User();
        try {
            JSONParser j = new JSONParser();
            Map<String, Object> tasksListJson = j.parseJSON(new CharArrayReader(jsonText.toCharArray()));

            return tasksListJson;

        } catch (IOException ex) {

        }
        return null;
    }

    public String connect(String mail, String password) {
        String url = Statics.BASE_URL_User + "/ConnexionUserMobile/" + mail + "/" + password;
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {

                //Users = parseUsers(new String(req.getResponseData()));
                resultatCnx = parseConnexion(new String(req.getResponseData()));
                req.removeResponseListener(this);

            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return resultatCnx.get("resultat").toString();
    }
    public String connect(String mail) {
      String url = Statics.BASE_URL_User + "/ConnexionUserMobileViaFacebook/" + mail ;
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {

                //Users = parseUsers(new String(req.getResponseData()));
                resultatCnx = parseConnexion(new String(req.getResponseData()));
                req.removeResponseListener(this);

            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return resultatCnx.get("resultat").toString();
    }

    public User getUser(String text) {
        List<User> l = getUsers();
        boolean test = false;
        int i;
        for (i = 0; i < l.size(); i++) {
            if (l.get(i).getMail().compareTo(text) == 0) {
                return l.get(i);
            }
        }
        return null;
    }

    public void update(int id, String mail, String password) {
        String url = Statics.BASE_URL_User + "/UpdateUserMobile/" + id + "/" + mail + "/" + password;
        System.out.print(url);
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);

        NetworkManager.getInstance().addToQueueAndWait(req);

    }

    public User getUser(int id) {
        List<User> l = getUsers();
        int i;
        for (i = 0; i < l.size(); i++) {
            if (l.get(i).getId() == id) {
                return l.get(i);
            }
        }
        return null;
    }

    

    
}
