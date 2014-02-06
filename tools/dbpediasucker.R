queries <- function(x ){
  
  i1<- toString(x[1])
  i2<- toString(x[2])
  i3<- paste("_" , i2 , sep = "")
  
  query <- paste(prefix,
                 'SELECT  ?isValueOf ?name
                 WHERE {
                 ?isValueOf <http://purl.org/dc/terms/subject> ', i1 ,' .
                 ?isValueOf rdfs:label ?name 
                 FILTER(LANG(?name) = "" || LANGMATCHES(LANG(?name), "en"))
                 }')
  
  result <- SPARQL(endpoint,query,ns=prefix,extra=options)$result
  
  con <- dbConnect(MySQL(), user="KingKongRoot", password="CarBoot",  dbname="classroom_game", host="localhost",client.flag=CLIENT_MULTI_STATEMENTS)
  # write it back

  dbWriteTable(con,i3,result,overwrite=T)
  
  
}


#This script builds the world for story telling

# A human has to decide what categories to use and give these catagories and give them a human label, store these in a 

x = list(toy=c("<http://dbpedia.org/resource/Category:Toy_brands>", "toy_brands"),
        emotion=c("<http://dbpedia.org/resource/Category:Emotions>", "emotion"),
        entertainment=c("<http://dbpedia.org/resource/Category:Entertainment>", "entertainment"),
        pet=c("<http://dbpedia.org/resource/Category:Pet_mammals>", "pet"),
        social_class=c("<http://dbpedia.org/resource/Category:Social_classes>", "social_class"),
        stationery=c("<http://dbpedia.org/resource/Category:Stationery>", "stationery"))

endpoint <- "http://live.dbpedia.org/sparql"
options <- NULL

prefix <- "PREFIX owl: <http://www.w3.org/2002/07/owl#>
  PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
  PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
  PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
  PREFIX foaf: <http://xmlns.com/foaf/0.1/>
  PREFIX dc: <http://purl.org/dc/elements/1.1/>
  PREFIX : <http://dbpedia.org/resource/>
  PREFIX dbpedia2: <http://dbpedia.org/property/>
  PREFIX dbpedia: <http://dbpedia.org/>
  "
lapply(x, queries)

cons<-dbListConnections(MySQL())
for(con in cons)
dbDisconnect(con) 
