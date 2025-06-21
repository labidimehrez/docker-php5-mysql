Configuration MySQL sur l'hôte
Pour que la connexion fonctionne, assurez-vous que MySQL sur votre hôte local :

1-Écoute sur toutes les interfaces :

Éditez /etc/mysql/mysql.conf.d/mysqld.cnf
Commentez ou modifiez : bind-address = 0.0.0.0


2-Autorise les connexions externes :
sqlCREATE USER 'root'@'%' IDENTIFIED BY 'votre_mot_de_passe';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%';
FLUSH PRIVILEGES;

3-Redémarrez MySQL :
 sudo systemctl restart mysql




Docker commande : 
sudo docker-compose down --remove-orphans
sudo docker-compose down --rmi all
sudo docker-compose build --no-cache
sudo docker-compose up -d
sudo docker-compose logs -f


# Arrêter tous les conteneurs
sudo docker stop $(sudo docker ps -aq)

# Supprimer tous les conteneurs
sudo docker rm $(sudo docker ps -aq)

# Nettoyer le système Docker
sudo docker system prune -a -f

# Puis relancer votre projet
docker-compose up --build -d


4- Dans le navigateur:
http://127.0.0.1:8080 

