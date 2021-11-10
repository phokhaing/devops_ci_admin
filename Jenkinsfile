pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                echo 'Building resource from github...'
                git branch: 'main', credentialsId: 'github-credential', url: 'https://github.com/PHO-KHAING/ci_admin.git'
            }
        }
        stage('Build docker image'){
            steps {
               sh 'docker compose-up -d'
               //  withCredentials([string(credentialsId: 'dockerhub-pwd', variable: 'dockerhub-pwd')]) {
                    
               //  }
            }
        }
    }
}
