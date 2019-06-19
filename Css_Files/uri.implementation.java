package uri.implementation;

import uri.Uri;
import uri.UriParser;


public class UriParserImplementation implements UriParser {
	
	private String uristring;
	
	public UriParserImplementation(String uristring) {
		this.uristring = uristring;
	}
	
	@Override
	public Uri parse() {
		
		if(uristring == "") {
			return null;
		}
		
		if(uristring == null) {
			return null;
		}
		
        if(!uristring.matches("\\w+:(\\/\\/).*")){
            return null;
        }
		
		String scheme;
		String[] urisplitscheme = uristring.split("://");
		
		if(urisplitscheme.length < 1) {
			return null;
		} else {
			scheme = urisplitscheme[0];
		}
		
		if (!scheme.matches("[A-Za-z][A-Za-z0-9]*")) {
			return null;
		} 
		
		
		String [] urisplituserinfo;
		String [] urisplithost;
		String [] urisplitquery;
	    String userinfo = null;
		String host = "";
		String path = "";
		String query = null;
		
		if(urisplitscheme.length > 1) {
			if(urisplitscheme[1].indexOf('@') > -1){
				
			    urisplituserinfo = urisplitscheme[1].split("@");		    
			    userinfo = urisplituserinfo[0];
			   
			    
			    if (urisplituserinfo.length > 1){
			    	
	    		    if(urisplituserinfo[1].indexOf('/') > -1){
	    		    	
	    		      urisplithost = urisplituserinfo[1].split("/");
	    		      host = urisplithost[0];
	    		      
	    		      if(urisplithost.length > 1){
		    		      if(urisplithost[1].indexOf('?') > -1){
		    		          urisplitquery = urisplithost[1].split("\\?");
		    		          
		    		          if(urisplitquery.length > 1) {
		    		              path = urisplitquery[0];
		    		        	  query = urisplitquery[1];
		    		          } else if (urisplitquery.length == 1 && urisplithost[1].matches(".*\\?")){
		    		        	  query = "";
		    		              path = urisplitquery[0];
		    		          } else if (urisplitquery.length == 1 && urisplithost[1].matches("?.*")){
		    		        	  path = "";
		    		        	  query = urisplitquery[1];
		    		          } else {
		    		        	  path = "";
		    		        	  query = "";
		    		          }
		    		      } else {
		    		    	  
		    		    	  if(urisplithost.length > 1) {
		    		    		  path = urisplithost[1];
		    		    	  } else {
		    		    		  path = "";
		    		    	  }
		    		          query = null;
		
		    		      }
	    		      }
	    		    }else if((urisplituserinfo[1].indexOf('/') < 0) && (urisplituserinfo[1].indexOf('?') < 0)){
	    		        host = urisplituserinfo[1];
	    		        path = "";
	    		        query = null;
	    		    }
			    } else {
			        path = "";
			        host = "";
			        query = null;
			    }
			    
			} else {
				
			  userinfo = null;
			  
			    if(urisplitscheme[1].indexOf('/') > -1){
			      urisplithost = urisplitscheme[1].split("/");
			      
			      if(urisplithost.length < 1){
	                    host = "";
	                    path = "";
	                }else if (urisplithost.length > 1){
	                    host = urisplithost[0];
	                    
	                    if(urisplithost[1].matches("\\?")){
	                        path = "";
	                    }else {
	                       path = urisplithost[1];
	                    }
	                }else {
	                   host = urisplithost[0];
	                   path = "";

			      
			      if(urisplithost.length > 1){
			    	  
			      }
				      if(urisplithost[1].indexOf('?') > -1){
				          urisplitquery = urisplithost[1].split("\\?");
				          
				          if(urisplitquery.length > 0){
	    			            query = urisplitquery[0];
    			          } else {
    			              query = "";
    			          }
	
		    		  }else {
		    		      query = null;
		    		  }
			      }
			    }else if((urisplitscheme[1].indexOf('/') < 0) && (urisplitscheme[1].indexOf('?') < 0)){
			        host = urisplitscheme[1];
			        path = "";
			        query = null;
	    	    }else if(urisplitscheme[1].indexOf('?') > -1){
	    	        urisplitquery = urisplitscheme[1].split("?");
	    	        
	    	        if(urisplitquery.length > 1){
	    		        query = urisplitquery[0];
	    	        } else {
	    	            query = "";
	    	        }
	    		    host = "";
	    	        path = "";

	    	        
	    	    }else{
	    	      host = "";
	    	      path = "";
	    	      query = null;
	    	    }
			}
			
			if(userinfo != null) {
			    if(!userinfo.matches("(?:[A-Za-z0-9\\.:@]|%[0-9A-Fa-f]{2})*")) {
					return null;
			    }
			}
			
			if(host != ""){
	    		if(!host.matches("(?:[A-Za-z0-9\\.]|%[0-9A-Fa-f]{2})*")) {
	    			return null;
	    		}	
			}
				
			if(path != ""){	
	    		if(!path.matches("(?:[A-Za-z0-9\\.]|%[0-9A-Fa-f]{2})*")) {
	    			return null;
	    		}
			}
			
			if(query != null) {
				if(!query.matches("(?:[A-Za-z0-9\\.&=]|%[0-9A-Fa-f]{2})*")) {
					return null;
				}
			}
			
		}
		
		
		return new UriImplementation(scheme, query, userinfo, new HostImplementation(host), path);
	}
	
}
