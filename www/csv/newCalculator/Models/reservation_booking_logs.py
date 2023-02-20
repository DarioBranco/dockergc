from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class reservation_booking_logs(Base):
	__tablename__ = 'reservation_booking_logs'
	id = Column(Integer, primary_key=True)
	CPID = Column(Text)
	LOC = Column(Text)
	ChrgSessID = Column(Text)
	Time = Column(Text)
	EVID = Column(Text)
	Conn = Column(Text)
	EventType = Column(Text)
	Status = Column(Text)
	EST = Column(Text)
	LFT = Column(Text)
	EnergyStart = Column(Text)
	EnergyEnd = Column(Text)
	EnergyMin = Column(Text)
	SOCStart = Column(Text)
	SOCEnd = Column(Text)
	Priority = Column(Text)
	V2G = Column(Text)
	PriceListID = Column(Text)
	TariffID = Column(Text)
	SwID = Column(Text)
