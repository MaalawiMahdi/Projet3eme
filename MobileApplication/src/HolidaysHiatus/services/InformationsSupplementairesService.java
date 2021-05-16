/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

/**
 *
 * @author mahdi
 */
import HolidaysHiatus.entities.InformationsSupplementaires;
import HolidaysHiatus.tools.Statics;
import com.codename1.io.CharArrayReader;
import com.codename1.io.ConnectionRequest;
import com.codename1.io.JSONParser;
import com.codename1.io.NetworkEvent;
import com.codename1.io.NetworkManager;
import com.codename1.ui.events.ActionListener;
import java.io.IOException;
import java.util.Map;
public class InformationsSupplementairesService {
    InformationsSupplementaires ProfilInfo;
      public InformationsSupplementaires parseInfo(String jsonText) {
         InformationsSupplementaires info = new InformationsSupplementaires();
        try {
            JSONParser j = new JSONParser();
            Map<String, Object> tasksListJson = j.parseJSON(new CharArrayReader(jsonText.toCharArray()));
            info.setId((int) Float.parseFloat(tasksListJson.get("id").toString()));
                        info.setUser_id((int) Float.parseFloat(tasksListJson.get("user_id").toString()));
                        info.setNom(tasksListJson.get("nom").toString());
                        info.setPrenom(tasksListJson.get("prenom").toString());
                        info.setTell(tasksListJson.get("tell").toString());
                        info.setImage(tasksListJson.get("image").toString());

            return info;

        } catch (IOException ex) {

        }
        return null;
    }
       public InformationsSupplementaires getProfil(int id) {
        String url = Statics.BASE_URL_User + "/ProfilUserMobile/" + id;
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                
               //Users = parseUsers(new String(req.getResponseData()));
                ProfilInfo = parseInfo(new String(req.getResponseData()));
                req.removeResponseListener(this);

            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return ProfilInfo;
    }

    public void update(int id, String nom, String prenom, String tell) {
      
        String url = Statics.BASE_URL_User + "/UpdateProfilMobile/" + id + "/" + nom + "/" + prenom + "/" + tell;
      
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);

        NetworkManager.getInstance().addToQueueAndWait(req);
            }
}
