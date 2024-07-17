from diagrams import Diagram, Cluster
from diagrams.programming.framework import Laravel
from diagrams.programming.flowchart import Action

with Diagram("Exemplo de Arquitetura"):
    laravel = Laravel("Rest")


    with Cluster("Camada de Aplicação"):
        application = Action("Application")
        


        laravel >> application

    with Cluster("Camada de Dominio"):
        useCases = Action("Use Cases")
        create = Action("Create")
        list = Action("List")
        delete = Action("Delete")
        get = Action("Get")
        update = Action("Update")
        service = Action("Service")
        aggregates = Action("Aggregates")

        application >> useCases
        useCases >> create
        useCases >> list
        useCases >> delete
        useCases >> get
        useCases >> update

        aggregates >> service >> useCases