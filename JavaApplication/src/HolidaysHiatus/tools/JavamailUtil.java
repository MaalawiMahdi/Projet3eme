/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.tools;

import HolidaysHiatus.services.AideCrud;
import java.util.Properties;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.mail.Authenticator;
import javax.mail.Message;
import javax.mail.MessagingException;
import javax.mail.PasswordAuthentication;
import javax.mail.Session;
import javax.mail.Transport;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeMessage;
 
import java.util.Properties;
import java.util.Random;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.activation.DataHandler;
import javax.activation.DataSource;
import javax.activation.FileDataSource;
import javax.mail.Authenticator;
import javax.mail.BodyPart;
import javax.mail.Message;
import javax.mail.MessagingException;
import javax.mail.Multipart;
import javax.mail.PasswordAuthentication;
import javax.mail.Session;
import javax.mail.Transport;

import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeBodyPart;
import javax.mail.internet.MimeMessage;
import javax.mail.internet.MimeMultipart;


/**
 *
 * @author drwhoo
 */
public class JavamailUtil {
 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


    public static void sendMailaide(String recepient,String titre,String name) throws Exception{
        System.out.println("Preparing to send:");
        Properties properties = new Properties();
        

        
        String myAccountEmail ="holidayhiatuspidev@gmail.com";
        String password ="esprit2021";
        
        properties.put("com.hof.email.starttime","20170519094544");
        properties.put("mail.smtp.auth","true");
        properties.put("mail.smtp.connectiontimeout","60000");
        properties.put("mail.smtp.host","smtp.gmail.com");
        properties.put("mail.smtp.port","25");
        properties.put("mail.smtp.ssl.trust","*");
        properties.put("mail.smtp.starttls.enable","true");
        properties.put("mail.smtp.timeout","60000");
        properties.put("mail.transport.protocol","smtp");
        String titres=titre;
        
        String names=name;
        Session session = Session.getInstance(properties, new Authenticator(){
            @Override
            protected PasswordAuthentication getPasswordAuthentication() {
                return new PasswordAuthentication(myAccountEmail, password);
            }
        });
        
        Message message = prepareMessageaide(session,myAccountEmail,recepient,titres,names);
        
        Transport.send(message);
        System.out.println("message send successfully");
    }

   private static Message prepareMessageaide(Session session, String myAccountEmail,String recepient,String titre,String name){
        try {
           AideCrud aide= new AideCrud();
            
            Message message = new MimeMessage(session);
            message.setFrom(new InternetAddress(myAccountEmail));
            message.setRecipient(Message.RecipientType.TO, new InternetAddress(recepient));
            message.setSubject("Holiday Hiatus "  );
             message.setText(name+ "Merci d'avoir noté l'aide " + titre);
            
         
            return message;
        } catch (MessagingException ex) {
            Logger.getLogger(JavamailUtil.class.getName()).log(Level.SEVERE, null, ex);
        }
        return null;
    }
     public static void sendMail(String recepient,String subject,String messagevalue) throws Exception{
        System.out.println("Preparing to send:");
        Properties properties = new Properties();
        

        
        String myAccountEmail ="holidayhiatuspidev@gmail.com";
        String password ="esprit2021";
        
        properties.put("com.hof.email.starttime","20170519094544");
        properties.put("mail.smtp.auth","true");
        properties.put("mail.smtp.connectiontimeout","60000");
        properties.put("mail.smtp.host","smtp.gmail.com");
        properties.put("mail.smtp.port","25");
        properties.put("mail.smtp.ssl.trust","*");
        properties.put("mail.smtp.starttls.enable","true");
        properties.put("mail.smtp.timeout","60000");
        properties.put("mail.transport.protocol","smtp");
        
        
        
        Session session = Session.getInstance(properties, new Authenticator(){
            @Override
            protected PasswordAuthentication getPasswordAuthentication() {
                return new PasswordAuthentication(myAccountEmail, password);
            }
        });
        
        Message message = prepareMessage(session,myAccountEmail,recepient,subject,messagevalue);
        
        Transport.send(message);
        System.out.println("message send successfully");
    }
        
    public static void sendMailWithHtmlCode(String recepient,String subject,String messagevalue) throws Exception{
        System.out.println("Preparing to send:");
        Properties properties = new Properties();
        

        
        String myAccountEmail ="holidayhiatuspidev@gmail.com";
        String password ="esprit2021";
        
        properties.put("com.hof.email.starttime","20170519094544");
        properties.put("mail.smtp.auth","true");
        properties.put("mail.smtp.connectiontimeout","60000");
        properties.put("mail.smtp.host","smtp.gmail.com");
        properties.put("mail.smtp.port","25");
        properties.put("mail.smtp.ssl.trust","*");
        properties.put("mail.smtp.starttls.enable","true");
        properties.put("mail.smtp.timeout","60000");
        properties.put("mail.transport.protocol","smtp");
        
        
        
        Session session = Session.getInstance(properties, new Authenticator(){
            @Override
            protected PasswordAuthentication getPasswordAuthentication() {
                return new PasswordAuthentication(myAccountEmail, password);
            }
        });
        
        Message message = prepareMessage(session,myAccountEmail,recepient,subject);
        message.setContent(messagevalue, "text/html; charset=utf-8");

        Transport.send(message);
        System.out.println("message send successfully");
    }
    
   private static Message prepareMessage(Session session, String myAccountEmail,String recepient,String subject,String messagevalue){
        try {
            
            Message message = new MimeMessage(session);
            message.setFrom(new InternetAddress(myAccountEmail));
            message.setRecipient(Message.RecipientType.TO, new InternetAddress(recepient));
            message.setSubject(subject);
            
            message.setText(messagevalue);
            return message;
        } catch (MessagingException ex) {
           // Logger.getLogger(JavamailUtil.class.getName()).log(Level.SEVERE, null, ex);
            System.out.println(ex.getMessage());
        }
        return null;
    }
   //PrepareMessage kan bech test3ml SendMailWithHTMLcode fn (man8ir messagevalue variable ) 
   
   
    private static Message prepareMessage(Session session, String myAccountEmail,String recepient,String subject){
        try {
            
            Message message = new MimeMessage(session);
            message.setFrom(new InternetAddress(myAccountEmail));
            message.setRecipient(Message.RecipientType.TO, new InternetAddress(recepient));
            message.setSubject(subject);
            
            return message;
        } catch (MessagingException ex) {
            Logger.getLogger(JavamailUtil.class.getName()).log(Level.SEVERE, null, ex);
        }
        return null;
    } 
    // Send Mail with File : 
    private static Message prepareMessageWithFile(Session session, String myAccountEmail,String recepient,String subject,String messagevalue,String file){
     try{  
     Message message = new MimeMessage(session);

         // Set From: header field of the header.
         message.setFrom(new InternetAddress(myAccountEmail));

         // Set To: header field of the header.
            message.setRecipient(Message.RecipientType.TO, new InternetAddress(recepient));

         // Set Subject: header field
         message.setSubject(subject);

         // Create the message part
         BodyPart messageBodyPart = new MimeBodyPart();

         // Now set the actual message
         messageBodyPart.setText(messagevalue);

         // Create a multipar message
         Multipart multipart = new MimeMultipart();

         // Set text message part
         multipart.addBodyPart(messageBodyPart);

         // Part two is attachment
         messageBodyPart = new MimeBodyPart();
         String filename = file;
         DataSource source = new FileDataSource(filename);
         messageBodyPart.setDataHandler(new DataHandler(source));
         messageBodyPart.setFileName(filename);
         multipart.addBodyPart(messageBodyPart);

         // Send the complete message parts
         message.setContent(multipart);

return message;
  
      } catch (MessagingException e) {
            Logger.getLogger(JavamailUtil.class.getName()).log(Level.SEVERE, null, e);
      }
     return null;
    }  
    public static void sendMailWithFile(String recepient,String subject,String messagevalue,String filename) throws Exception{
        System.out.println("Preparing to send:");
        Properties properties = new Properties();
        

        
        String myAccountEmail ="holidayhiatuspidev@gmail.com";
        String password ="esprit2021";
        
        properties.put("com.hof.email.starttime","20170519094544");
        properties.put("mail.smtp.auth","true");
        properties.put("mail.smtp.connectiontimeout","60000");
        properties.put("mail.smtp.host","smtp.gmail.com");
        properties.put("mail.smtp.port","25");
        properties.put("mail.smtp.ssl.trust","*");
        properties.put("mail.smtp.starttls.enable","true");
        properties.put("mail.smtp.timeout","60000");
        properties.put("mail.transport.protocol","smtp");
        
        
        
        Session session = Session.getInstance(properties, new Authenticator(){
            @Override
            protected PasswordAuthentication getPasswordAuthentication() {
                return new PasswordAuthentication(myAccountEmail, password);
            }
        });
        
        Message message = prepareMessageWithFile(session,myAccountEmail,recepient,subject,messagevalue,filename);
        
        Transport.send(message);
        System.out.println("message send successfully");
    }
    
}
