from diagrams import Diagram, Cluster, Edge
from diagrams.programming.framework import Laravel
from diagrams.programming.flowchart import Action

with Diagram("Arquitetura Atual"):
    with Cluster("Core"):
        with Cluster("Dominio"):
            with Cluster("Entity"):
                serviceType = Action("ServiceType")

            with Cluster("ValueObject"):
                uuid = Action("Uuid")       

            with Cluster("Repository"):
                serviceTypeRepositoryInterface = Action("ServiceTypeRepositoryInterface")

            uuid >> serviceType 