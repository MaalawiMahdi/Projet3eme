/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.services.UserService;
import HolidaysHiatus.tools.Session;
import com.codename1.components.ScaleImageLabel;
import com.codename1.facebook.FaceBookAccess;
import com.codename1.facebook.User;
import com.codename1.io.Storage;
import com.codename1.io.URL;
import com.codename1.social.FacebookConnect;
import com.codename1.social.Login;
import com.codename1.social.LoginCallback;
import com.codename1.ui.Button;
import com.codename1.ui.Dialog;
import com.codename1.ui.EncodedImage;
import com.codename1.ui.Form;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.URLImage;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.geom.Dimension;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.util.Resources;
import java.io.IOException;
import java.net.URISyntaxException;


/**
 * GUI builder created Form
 *
 * @author Tiburcio
 */
public class FaceBookForm extends com.codename1.ui.Form {
   Resources theme;
   String action;
    public FaceBookForm() {
        this(com.codename1.ui.util.Resources.getGlobalResources());
    }
    
    public FaceBookForm(Resources theme) {
        this.theme=theme;
        showFormElements();
    }
     public FaceBookForm(Resources theme,String action) {
         this.action=action;
        this.theme=theme;
        showFormElements();
    }

//-- DON'T EDIT BELOW THIS LINE!!!


// <editor-fold defaultstate="collapsed" desc="Generated Code">                          
    private void initGuiBuilderComponents(com.codename1.ui.util.Resources resourceObjectInstance) {
        setLayout(new com.codename1.ui.layouts.LayeredLayout());
        setInlineStylesTheme(resourceObjectInstance);
                setInlineStylesTheme(resourceObjectInstance);
        setTitle("UserForm");
        setName("UserForm");
    }// </editor-fold>

//-- DON'T EDIT ABOVE THIS LINE!!!

    private void showFormElements() {
        FacebookConnect.getInstance().doLogout();
        Storage.getInstance().writeObject("token", "");
        this.setScrollable(false);
        this.setLayout(new BoxLayout(BoxLayout.Y_AXIS));
        showIfNotLoggedIn(this);
    }

    private void showData(FaceBookForm form) {
        
        String token = (String) Storage.getInstance().readObject("token");
        if(token == null || token.equals("")){
            showIfNotLoggedIn(form);
        } else {
            showIfLoggedIn(form);
        }
    }

    private void showIfNotLoggedIn(FaceBookForm form) {
                facebookLogin(form);
            //form.show();
        
    }

    private void showIfLoggedIn(FaceBookForm form) {
        String token = (String) Storage.getInstance().readObject("token");
        FaceBookAccess.setToken(token);
            final User me = new User();
            try {
                FaceBookAccess.getInstance().getUser("me?fields=id,first_name,last_name,email,name", me, new ActionListener() {
                    @Override
                    public void actionPerformed(ActionEvent evt) {
                        if(action.compareTo("inscription")==0){
                        Session.getSession().getFacebookInscription().setMail(me.getEmail());
                        Session.getSession().getFacebookData().setNom(me.getFirst_name());
                        Session.getSession().getFacebookData().setPrenom(me.getLast_name());
                        Session.getSession().getFacebookData().setImage("https://graph.facebook.com/v2.11/me/picture?access_token="+token);
                                        FaceBookAccess.logOut();

                        HomePageFrom home = new HomePageFrom(theme);
                        home.show();
                        }else if(action.compareTo("connexion")==0){
                            UserService us = new UserService();
                            if (us.isExiste(me.getEmail()) == false) {
                                Dialog.show("compte introuvable", "votre adresse mail est introuvable,merci de remplir notre formulaire d'inscription ", "ok", null);
                             HomePageFrom home = new HomePageFrom(theme);
                             home.show();
                      
                            }else{
                                String cnxResultat = us.connect(me.getEmail());
                                if (cnxResultat.compareTo("banned") == 0) {
                                    Dialog.show("Vous avez été banni", "", "ok", null);

                                } else {
                                    Dialog.show("Welcome", "", "ok", null);
                                    Session.StartSession();
                                    Session.getSession().SetSessionUser(us.getUser(me.getEmail()));
                                    Form profil = new ProfilForm(theme);
                                    profil.show();
                                }
                            }
                        }
                        //form.show();
                    }
                });
            } catch (IOException ex) {
                ex.printStackTrace();
                showIfNotLoggedIn(form);
            }
    }

    private void facebookLogout(FaceBookForm form) {
      String clientId = "295724405495342";
        String redirectURI = "http://localhost/"; //Una URI cualquiera. Si la pones en tu equipo debes crear un Servidor Web. Yo usé XAMPP
        String clientSecret = "f9fd041c52a8bf5d3636a1d677e0f3aa";
         Login fb = FacebookConnect.getInstance();
        fb.setClientId(clientId);
        fb.setRedirectURI(redirectURI);
        fb.setClientSecret(clientSecret);

        //trigger the login if not already logged in
        fb.doLogout();
        Storage.getInstance().writeObject("token", "");
        showIfNotLoggedIn(form);
    }
    
    private void facebookLogin(FaceBookForm form) {
        //use your own facebook app identifiers here   
        //These are used for the Oauth2 web login process on the Simulator.
        String clientId = "295724405495342";
        String redirectURI = "http://localhost/"; //Una URI cualquiera. Si la pones en tu equipo debes crear un Servidor Web. Yo usé XAMPP
        String clientSecret = "f9fd041c52a8bf5d3636a1d677e0f3aa";
        Login fb = FacebookConnect.getInstance();
        fb.setClientId(clientId);
        fb.setRedirectURI(redirectURI);
        fb.setClientSecret(clientSecret);
        //Sets a LoginCallback listener
        fb.setCallback(new LoginCallback() {
            @Override
            public void loginFailed(String errorMessage) {
                System.out.println("Falló el login");
                Storage.getInstance().writeObject("token", "");
                showIfNotLoggedIn(form);
            }

            @Override
            public void loginSuccessful() {
                System.out.println("Funcionó el login");
                String token = fb.getAccessToken().getToken();
                Storage.getInstance().writeObject("token", token);
                showIfLoggedIn(form);
            }
            
        });
        //trigger the login if not already logged in
        if(!fb.isUserLoggedIn()){
            fb.doLogin();
        }else{
            //get the token and now you can query the facebook API
            String token = fb.getAccessToken().getToken();
            Storage.getInstance().writeObject("token", token);
            showIfLoggedIn(form);
        }
    }
}
