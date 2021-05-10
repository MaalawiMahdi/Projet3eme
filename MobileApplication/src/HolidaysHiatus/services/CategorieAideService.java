/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.entities.CategorieAide;
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
 * @author drwhoo
 */
public class CategorieAideService {
      public ArrayList<CategorieAide> cataides;

    public static CategorieAideService instance ;
    //private ConnectionRequest req ;
    
    /*public AideService()
    { req = new ConnectionRequest();
    }*/
    
    public boolean resultOK;
 
     public static CategorieAideService getInstance() {
        if (instance == null) {
            instance = new CategorieAideService();
        }
        return instance;
    }

 public ArrayList<CategorieAide> parseCatAide(String jsonText){
        try {
            cataides=new ArrayList<>();
            JSONParser j = new JSONParser();
            Map<String,Object> tasksListJson = j.parseJSON(new CharArrayReader(jsonText.toCharArray()));
            
            List<Map<String,Object>> list = (List<Map<String,Object>>)tasksListJson.get("root");
            for(Map<String,Object> obj : list){
                CategorieAide c = new CategorieAide();
                c.setId(((int)Float.parseFloat( obj.get("id").toString())));
                c.setTitre(obj.get("titre").toString());
                c.setLien_icon(obj.get("lien_icon").toString());
                c.setNbaide((int)Float.parseFloat( obj.get("aides").toString()));
               
                cataides.add(c);
            }
            
        } catch (IOException ex) {
            
        }
        return cataides;
    }
       public ArrayList<CategorieAide> getAllCatAides(){
        
        String url = Statics.BASE_URL_CatAide + "/Afficher";

         ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                cataides = parseCatAide(new String(req.getResponseData()));
           req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);

        return cataides;
    }
          public Boolean addCategorieAide(String Titre) {
     
        
               
     
        String url = Statics.BASE_URL_CatAide + "/Ajouter" + "/"+ Titre;
    
   
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOK = req.getResponseCode() == 200; //Code HTTP 200 OK
                req.removeResponseListener(this);
            }
        });
        
        NetworkManager.getInstance().addToQueueAndWait(req);
   
    
    
    return resultOK; 
}
 
  public Boolean deleteCategorieAide(int idcat) {
     
        
               
     
        String url = Statics.BASE_URL_CatAide + "/supprimer" + "/"+ idcat;
    
   
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOK = req.getResponseCode() == 200; //Code HTTP 200 OK
                req.removeResponseListener(this);
            }
        });
        
        NetworkManager.getInstance().addToQueueAndWait(req);
    return resultOK; 
}
  
  public Boolean editCategorieAide(int idcat, String titre) {
     
        
               
     
        String url = Statics.BASE_URL_CatAide + "/modifier" + "/"+ idcat+"/"+titre;
    
   
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOK = req.getResponseCode() == 200; //Code HTTP 200 OK
                req.removeResponseListener(this);
            }
        });
        
        NetworkManager.getInstance().addToQueueAndWait(req);

    return resultOK; 
}
          
}
