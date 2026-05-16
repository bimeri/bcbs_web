pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                echo "Running ${env.BUILD_ID} on ${env.JENKINS_URL}"
                echo 'Building..'
                sh 'composer install'
                echo 'done!'
            }
        }
        stage('Test') {
            steps {
                echo 'Testing..'
                sh './vendor/bin/phpunit'
                echo 'done testing!'
            }
        }
        stage('Deploy') {
            steps {
                echo 'Deploying cool....'
            }
        }
    }
}
