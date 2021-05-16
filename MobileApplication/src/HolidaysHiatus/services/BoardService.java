package HolidaysHiatus.services;
import java.util.ArrayList;
import java.util.Map;

import com.codename1.io.CharArrayReader;
import com.codename1.io.ConnectionRequest;
import com.codename1.io.JSONParser;
import com.codename1.io.NetworkEvent;
import com.codename1.io.NetworkManager;
import com.codename1.ui.events.ActionListener;

import java.io.IOException;
import java.util.*;


import HolidaysHiatus.entities.*;
import HolidaysHiatus.tools.Statics;

public class BoardService {


    public ArrayList<Board> boards;

    public static BoardService instance;
    //private ConnectionRequest req ;

    /*public AideService()
    { req = new ConnectionRequest();
    }*/
    public boolean resultOK;

    public static BoardService getInstance() {
        if (instance == null) {
            instance = new BoardService();
        }
        return instance;
    }

    public ArrayList<Board> parseBoard(String jsonText) {
        try {
            boards = new ArrayList<>();
            JSONParser j = new JSONParser();
            Map<String, Object> tasksListJson = j.parseJSON(new CharArrayReader(jsonText.toCharArray()));

            List<Map<String, Object>> list = (List<Map<String, Object>>) tasksListJson.get("root");
            for (Map<String, Object> obj : list) {
                Board b = new Board();
                b.setId(((int) Float.parseFloat(obj.get("id").toString())));
                b.setCategorie_id(((int) Float.parseFloat(obj.get("categorie_id").toString())));

                // c.setBoard_id(((int) Float.parseFloat(obj.get("board_id").toString())));
                b.setTitre(obj.get("titre").toString());
                b.setPic(obj.get("pic").toString());

                boards.add(b);
            }

        } catch (IOException ex) {
            ex.getMessage();

        }
        return boards;
    }

    public ArrayList<Board> getBoardParCategorie(int i) {

        String url = Statics.BASE_URL_Board + "/AfficherBoardMobile/" + i;
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                boards = parseBoard(new String(req.getResponseData()));
            
                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
    
        return boards;
    }
    public void AjouterBoard(Board b) {	
        String url = Statics.BASE_URL_Board + "/AjouterBoardMobile/" + b.getTitre() + "/" + b.getCategorie_id()+"/"+b.getPic()+"/"+b.getSociete_id();
        
    
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);

        NetworkManager.getInstance().addToQueueAndWait(req);

    }
    public void ModifierBoard(Board b) {	
        String url = Statics.BASE_URL_Board + "/ModifierBoardMobile/" + b.getTitre() + "/" + b.getCategorie_id()+"/"+b.getPic()+"/"+b.getId();
        

        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);

        NetworkManager.getInstance().addToQueueAndWait(req);

    }
    public void SupprimerBoard(Board b) {	
        String url = Statics.BASE_URL_Board + "/SupprimerBoardMobile/" +b.getId();
        
 
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);

        NetworkManager.getInstance().addToQueueAndWait(req);

    }
    public int getCnbr(int i) {
    	
    	int j=0;
    	ArrayList<Board> List=getBoardParCategorie(i);
    	
                for (Board a : List) {
j++;                }
return j;
    }
    
    //get AllBoards with societeId 
    
    public ArrayList<Board> parseBoards(String jsonText) {
        try {
            boards = new ArrayList<>();
            JSONParser j = new JSONParser();
             Map<String,Object> tasksListJson = j.parseJSON(new CharArrayReader(jsonText.toCharArray()));
             List<Map<String,Object>> list = (List<Map<String,Object>>)tasksListJson.get("root");
            for (Map<String, Object> obj : list) {
                if(((int) Float.parseFloat(obj.get("societe_id").toString()))!=0){
                Board b = new Board();
                b.setId(((int) Float.parseFloat(obj.get("id").toString())));
                b.setCategorie_id(((int) Float.parseFloat(obj.get("categorie_id").toString())));
                b.setSociete_id(((int) Float.parseFloat(obj.get("societe_id").toString())));
                b.setTitre(obj.get("titre").toString());
                b.setPic(obj.get("pic").toString());
                boards.add(b);}
                
            }
        } catch (IOException ex) {
            ex.getMessage();

        }
        return boards;
    }

    public ArrayList<Board> getBoards() {

        String url = Statics.BASE_URL_Board + "/AfficherAllBoardsMobile/" ;
        ConnectionRequest req = new ConnectionRequest();
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                boards = parseBoards(new String(req.getResponseData()));
         

                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);

        return boards;
    }
    public boolean haveAboard(int idSociete) {
        List<Board> l = getBoards();
        boolean test = false;
        int i;
        for (i = 0; i < l.size(); i++) {
            if (l.get(i).getSociete_id()==idSociete) {
                test = true;
            }
        }
        return test;
    }
    public Board GetBoardByIdSociete(int idSociete) {
        List<Board> l = getBoards();
        boolean test = false;
        int i;
        for (i = 0; i < l.size(); i++) {
            if (l.get(i).getSociete_id()==idSociete) {
               return l.get(i);
            }
        }
        return null;
    }
}
