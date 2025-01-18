from fastapi import FastAPI, HTTPException, Depends
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
from typing import List, Optional
from datetime import datetime
from sqlalchemy import create_engine, Column, Integer, String, DateTime, ForeignKey
from sqlalchemy.orm import declarative_base, sessionmaker, relationship

# Initialize FastAPI app
app = FastAPI()

# Tambahkan Middleware CORS
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],  # Ganti "*" dengan daftar domain yang diizinkan jika perlu
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# Database setup
DATABASE_URL = "sqlite:///./clinic.db"
engine = create_engine(DATABASE_URL, connect_args={"check_same_thread": False})
SessionLocal = sessionmaker(autocommit=False, autoflush=False, bind=engine)
Base = declarative_base()

# Database models
class Patient(Base):
    __tablename__ = "patients"
    id = Column(Integer, primary_key=True, index=True)
    name = Column(String, index=True)
    age = Column(Integer)
    gender = Column(String)
    created_at = Column(DateTime, default=datetime.utcnow)

class Appointment(Base):
    __tablename__ = "appointments"
    id = Column(Integer, primary_key=True, index=True)
    patient_id = Column(Integer, ForeignKey("patients.id"))
    doctor_name = Column(String)
    appointment_date = Column(DateTime)
    patient = relationship("Patient", back_populates="appointments")

Patient.appointments = relationship("Appointment", back_populates="patient")

Base.metadata.create_all(bind=engine)

# Pydantic models
class PatientBase(BaseModel):
    name: str
    age: int
    gender: str

class PatientCreate(PatientBase):
    pass

class PatientOut(PatientBase):
    id: int
    created_at: datetime

    class Config:
        from_attributes = True

class AppointmentBase(BaseModel):
    doctor_name: str
    appointment_date: datetime

class AppointmentCreate(AppointmentBase):
    patient_id: int

class AppointmentOut(AppointmentBase):
    id: int
    patient: PatientOut

    class Config:
        from_attributes = True

# Dependency
def get_db():
    db = SessionLocal()
    try:
        yield db
    finally:
        db.close()

# Routes for patients
@app.post("/patients/", response_model=PatientOut)
def create_patient(patient: PatientCreate, db: SessionLocal = Depends(get_db)):
    print("Received patient data:", patient.dict())  # Tambahkan ini
    db_patient = Patient(**patient.dict())
    db.add(db_patient)
    db.commit()
    db.refresh(db_patient)
    print("Patient saved:", db_patient)  # Tambahkan ini
    return db_patient


@app.get("/patients/", response_model=List[PatientOut])
def read_patients(skip: int = 0, limit: int = 10, db: SessionLocal = Depends(get_db)):
    patients = db.query(Patient).offset(skip).limit(limit).all()
    return patients

@app.get("/patients/{patient_id}", response_model=PatientOut)
def read_patient(patient_id: int, db: SessionLocal = Depends(get_db)):
    patient = db.query(Patient).filter(Patient.id == patient_id).first()
    if not patient:
        raise HTTPException(status_code=404, detail="Patient not found")
    return patient

# Routes for appointments
@app.post("/appointments/", response_model=AppointmentOut)
def create_appointment(appointment: AppointmentCreate, db: SessionLocal = Depends(get_db)):
    db_patient = db.query(Patient).filter(Patient.id == appointment.patient_id).first()
    if not db_patient:
        raise HTTPException(status_code=404, detail="Patient not found")
    db_appointment = Appointment(**appointment.dict())
    db.add(db_appointment)
    db.commit()
    db.refresh(db_appointment)
    return db_appointment

@app.get("/appointments/", response_model=List[AppointmentOut])
def read_appointments(skip: int = 0, limit: int = 10, db: SessionLocal = Depends(get_db)):
    appointments = db.query(Appointment).offset(skip).limit(limit).all()
    return appointments

@app.get("/appointments/{appointment_id}", response_model=AppointmentOut)
def read_appointment(appointment_id: int, db: SessionLocal = Depends(get_db)):
    appointment = db.query(Appointment).filter(Appointment.id == appointment_id).first()
    if not appointment:
        raise HTTPException(status_code=404, detail="Appointment not found")
    return appointment
